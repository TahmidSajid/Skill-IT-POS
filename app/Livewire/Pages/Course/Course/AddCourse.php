<?php

namespace App\Livewire\Pages\Course\Course;

use App\Models\Categories;
use Livewire\Component;
use App\Models\Courses;
use App\Models\Subcategory;
use Livewire\WithFileUploads;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;


class AddCourse extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $courseName, $categoryId, $subCategoryId = [], $description, $cost, $price, $status, $courseImage;
    public $discountPrice;


    #[Computed]
    public function categories()
    {
        return Categories::all();
    }
    #[Computed]
    public function subcategories()
    {
        if ($this->categoryId) {
            return Categories::where('id', '!=', $this->categoryId)->get();
        } else {
            return Categories::all();
        }
    }
    public function recheck()
    {
        dd('done');
        unset($this->subcategories);
    }
    public function addCourse()
    {
        $this->validate();
        $Image = new ImageManager(new Driver());
        $new_name = Str::random(5) . time() . "." . $this->courseImage->getClientOriginalExtension();
        $image = $Image->read($this->courseImage)->resize(720, 540);
        $image->save(('uploads/course_photos/' . $new_name), quality: 80);

        $data = [
            'course_name' => $this->courseName,
            'category_id' => $this->categoryId,
            'cost' => $this->cost,
            'price' => $this->price,
            'discount_price' => $this->discountPrice,
            'status' => $this->status,
            'course_image' => $new_name,
        ];
        $course_info = Courses::create($data);
        $sub_data = $this->subCategoryId;
        foreach ($sub_data as $key => $value) {
            Subcategory::insert([
                'course_id' => $course_info->id,
                'subcategory_id'=> $value,
            ]);
        };
        notyf()->addSuccess('Category added successfuly');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.pages.course.course.add-course');
    }
}
