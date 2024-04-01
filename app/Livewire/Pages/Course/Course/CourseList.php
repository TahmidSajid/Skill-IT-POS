<?php

namespace App\Livewire\Pages\Course\Course;

use App\Models\Courses;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
use App\Models\Categories;
use App\Models\Subcategory;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CourseList extends Component
{
    use WithFileUploads;
    use WithPagination;

    #[Validate('required')]
    public $courseName, $categoryId, $description, $cost, $price, $status, $courseImage;
    public $subCategoryId = [];
    public $discountPrice;
    public $newCourseImage;
    public $newSubCategory = [];

    #[On('reloading')]
    public function recheck()
    {
        unset($this->courses);
    }

    #[Computed]
    public function courses()
    {
        return Courses::paginate(5);
    }
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
    public function delete($id)
    {
        /**
         * Deletes a course by ID.
         *
         * Gets the course info by ID.
         * Checks if there is a course image and unlinks it.
         * Deletes the course record.
         * Deletes associated subcategories.
         */
        $courseInfo = Courses::where('id', $id)->first();
        if ($courseInfo->course_image) {
            unlink('uploads/course_photos/' . $courseInfo->course_image);
        }
        Courses::where('id', $id)->delete();
        Subcategory::where('course_id', $id)->delete();

        notyf()->addSuccess('Course has been deleted.');
    }
    public function edit($id)
    {
        /**
         * Get the course info by ID from the Courses model.
         * Assign course details to component properties.
         * Get associated subcategories from Subcategory model.
         * Check if discount price exists and assign to property.
         */
        $courseInfo = Courses::where('id', $id)->first();
        $this->subCategoryId = Subcategory::select('subcategory_id')->where('course_id', $id)->get();
        $this->courseName = $courseInfo->course_name;
        $this->categoryId = $courseInfo->category_id;
        $this->description = $courseInfo->description;
        $this->cost = $courseInfo->cost;
        $this->price = $courseInfo->price;
        $this->status = $courseInfo->status;
        $this->courseImage = $courseInfo->course_image;
        if ($courseInfo->discount_price) {
            $this->discountPrice = $courseInfo->discount_price;
        };
    }

    public function updateCourse($id)
    {
        $this->validate();
        /**
         * Updates the course with the given ID in the database
         * with the new values from the component properties.
         */
        $course_info = Courses::where('id', $id)->update([
            'course_name' => $this->courseName,
            'category_id' => $this->categoryId,
            'description' => $this->description,
            'cost' => $this->cost,
            'price' => $this->price,
            'discount_price' => $this->discountPrice,
            'status' => $this->status,
        ]);
        /**
         * Deletes any existing subcategory records associated with the course ID.
         * Then inserts new subcategory records for the course based on the newSubCategory
         * array property.
         */
        if ($this->newSubCategory != []) {
            Subcategory::where('course_id', $id)->delete();
            foreach ($this->newSubCategory as $key => $value) {
                Subcategory::insert([
                    'course_id' => $id,
                    'subcategory_id' => $value,
                ]);
            };
        }
        /**
         * If a new course image file was uploaded:
         * - Delete the existing image file for the course
         * - Generate a random string to use as the new filename
         * - Resize the uploaded image and save it with the new filename
         * - Update the course record with the new image filename
         */
        if ($this->newCourseImage) {
            unlink('uploads/course_photos/' . $this->courseImage);
            $Image = new ImageManager(new Driver());
            $new_name = Str::random(5) . time() . "." . $this->newCourseImage->getClientOriginalExtension();
            $image = $Image->read($this->newCourseImage)->resize(720, 540);
            $image->save(('uploads/course_photos/' . $new_name), quality: 80);
            Courses::where('id', $id)->update([
                'course_image' => $new_name,
            ]);
        }

        notyf()->addSuccess('Category Updated successfuly');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.pages.course.course.course-list');
    }
}
