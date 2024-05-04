<?php

namespace App\Livewire\Pages\Course\Category;

use App\Models\Categories;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Livewire\Component;

class CategoryList extends Component
{
    use WithPagination;
    use WithFileUploads;

    #[Validate('required')]
    public $categoryName;
    public $categoryDescription;
    public $categoryUpdateImage;
    public $imagePreview;

    public $search;

    #[On('reloading')]
    public function reloading(){
        unset($this->categories);
    }


    #[Computed]
    public function categories(){
        if ($this->search) {
            return Categories::where('category_name','like','%'.$this->search.'%')->paginate(5);
        }
        else{
            return Categories::paginate(5);
        }
    }


    public function delete($id){
        $categoryInfo = Categories::where('id',$id)->first();
        if($categoryInfo->category_photo){
            unlink('uploads/category_photos/'.$categoryInfo->category_photo);
        }
        Categories::where('id',$id)->delete();
        notyf()->addSuccess('Category deleted');
    }


    public function edit($id){
        $categoryInfo = Categories::where('id',$id)->first();
        $this->categoryName = $categoryInfo->category_name;
        $this->categoryDescription = $categoryInfo->category_description;
        $this->imagePreview = $categoryInfo->category_photo;

    }


    public function updateCategory($id){
        $this->validate();
        $categoryInfo = Categories::where('id',$id)->first();
        if($categoryInfo->category_photo){
            unlink('uploads/category_photos/'.$categoryInfo->category_photo);
        }
        $Image = new ImageManager(new Driver());
        $new_name = Str::random(5).time().".".$this->categoryUpdateImage->getClientOriginalExtension();
        $image = $Image->read($this->categoryUpdateImage)->resize(720,540);
        $image->save(('uploads/category_photos/'.$new_name),quality: 80);
        $tag = "#".str::slug($this->categoryName);
        Categories::where('id',$id)->update([
            'category_name' => $this->categoryName,
            'category_tag' => $tag,
        ]);
        if ($this->categoryDescription) {
            Categories::where('id',$id)->update([
                'category_description' => $this->categoryDescription,
            ]);
        };
        if ($this->categoryUpdateImage) {
            Categories::where('id',$id)->update([
                'category_photo' => $new_name,
            ]);
        };
        notyf()->addSuccess('Category Updated successfuly');
        $this->reset();
    }


    #[On('reloading')]
    public function render()
    {
        return view('livewire.pages.course.category.category-list');
    }
}
