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
        unset($this->subcategories);
    }
    public function addCourse()
    {
        $this->validate();
        /**
         * Resize the uploaded course image to 720x540 pixels using Intervention Image library,
         * generate a random filename, and save the resized image to the uploads/course_photos folder.
         */
        $Image = new ImageManager(new Driver());
        $new_name = Str::random(5) . time() . "." . $this->courseImage->getClientOriginalExtension();
        $image = $Image->read($this->courseImage)->resize(720, 540);
        $image->save(('uploads/course_photos/' . $new_name), quality: 80);


        /**
         * Create a new course record in the Courses model with the given data.
         *
         * The data array contains the course details like name, category, description etc.
         * A resized course image filename is also added.
         *
         * The create() method on the Courses model persists the new course record to the database.
         */
        $data = [
            'course_name' => $this->courseName,
            'category_id' => $this->categoryId,
            'description' => $this->description,
            'cost' => $this->cost,
            'price' => $this->price,
            'discount_price' => $this->discountPrice,
            'status' => $this->status,
            'course_image' => $new_name,
        ];
        $course_info = Courses::create($data);

        /**
         * Inserts records into the Subcategory table to associate
         * the newly created course with the selected subcategories.
         *
         * Loops through the array of selected subcategory IDs.
         * For each ID, inserts a record into Subcategory with the
         * course ID and subcategory ID. This creates the mapping
         * between courses and subcategories.
         */
        $sub_data = $this->subCategoryId;
        foreach ($sub_data as $key => $value) {
            Subcategory::insert([
                'course_id' => $course_info->id,
                'subcategory_id' => $value,
            ]);
        };

        
        notyf()->addSuccess('Course added successfuly');
        $this->dispatch('reloading');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.pages.course.course.add-course');
    }
}
