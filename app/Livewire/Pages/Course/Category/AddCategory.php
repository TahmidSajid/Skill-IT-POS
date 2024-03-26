<?php

namespace App\Livewire\Pages\Course\Category;

use App\Models\Categories;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Livewire\Component;

class AddCategory extends Component
{
    use WithFileUploads;
    #[Validate('required')]
    public $categoryName;
    public $categoryDescription;
    #[Validate('required')]
    public $categoryImage;

    public function addCategory(){
        $this->validate();

        $Image = new ImageManager(new Driver());
        $new_name = Str::random(5).time().".".$this->categoryImage->getClientOriginalExtension();
        $image = $Image->read($this->categoryImage)->resize(720,540);
        $image->save(('uploads/category_photos/'.$new_name),quality: 30);
        $tag = "#".str::slug($this->categoryName);

        $data = [
            'category_name' => $this->categoryName,
            'category_tag' => $tag,
            'category_photo' => $new_name,
        ];
        $ctaegory_info = Categories::create($data);

        if ($this->categoryDescription) {
            Categories::where('id',$ctaegory_info->id)->update([
                'category_description' => $this->categoryDescription,
            ]);
        };
        $this->dispatch('reloading');
        notyf()->addSuccess('Category added successfuly');
        $this->reset('categoryName','categoryDescription','categoryImage');
    }

    public function render()
    {
        return view('livewire.pages.course.category.add-category');
    }
}
