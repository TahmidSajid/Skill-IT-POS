<?php

namespace App\Livewire\Pages\Course\Course;

use Livewire\Component;
use App\Models\Courses;
use Livewire\Attributes\Validate;


class AddCourse extends Component
{
    #[Validate('required')]
    public $courseName;
    #[Validate('required')]
    public $categoryId;
    #[Validate('required')]
    public $subCategoryId;
    #[Validate('required')]
    public $description;
    #[Validate('required')]
    public $cost;
    #[Validate('required')]
    public $price;
    #[Validate('required')]
    public $discountPrice;
    #[Validate('required')]
    public $status;
    #[Validate('required')]
    public $courseImage;

    public function addCourse(){
        $this->validate();
        Courses::create([
            'course_name' => $this->courseName,
            'course_id' => $this->categoryId,
            'subcategory_id' => $this->subCategoryId,
            'cost' => $this->cost,
            'price' => $this->price,
            'discount_price' => $this->discountPrice,
            'status' => $this->status,
            'course_image' => $this->courseImage,
        ]);
    }
    public function render()
    {
        return view('livewire.pages.course.course.add-course');
    }
}
