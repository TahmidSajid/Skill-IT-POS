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
    public function reloading()
    {
        unset($this->categories);
    }


    #[Computed]
    public function categories()
    {
        if ($this->search) {
            return Categories::where('category_name', 'like', '%' . $this->search . '%')->paginate(5);
        } else {
            return Categories::paginate(5);
        }
    }


    public function delete($id)
    {
        /**
         * Deletes a category from the database and removes the associated category photo.
         *
         * @param int $id The ID of the category to delete.
         */
        $categoryInfo = Categories::where('id', $id)->first();
        if ($categoryInfo->category_photo) {
            unlink('uploads/category_photos/' . $categoryInfo->category_photo);
        }
        Categories::where('id', $id)->delete();
        notyf()->addSuccess('Category deleted');
    }


    public function edit($id)
    {
        /// Retrieves the category information for the specified ID and populates the corresponding properties.
        ///
        /// This code is part of the `updateCategory` method, which is responsible for updating an existing category.
        /// The selected code retrieves the category information from the database and assigns the category name, description,
        /// and photo to the corresponding properties of the Livewire component.
        $categoryInfo = Categories::where('id', $id)->first();
        $this->categoryName = $categoryInfo->category_name;
        $this->categoryDescription = $categoryInfo->category_description;
        $this->imagePreview = $categoryInfo->category_photo;
    }


    public function updateCategory($id)
    {
        /**
         * Updates the category information, including the category name, tag, description, and photo.
         *
         * This method is called when the user updates a category. It performs the following steps:
         * 1. Validates the input data.
         * 2. Retrieves the existing category information.
         * 3. Deletes the existing category photo if it exists.
         * 4. Generates a new photo name and saves the updated photo.
         * 5. Updates the category name and tag.
         * 6. Updates the category description if provided.
         * 7. Updates the category photo if a new photo was provided.
         * 8. Displays a success notification.
         * 9. Resets the form.
         */
        $this->validate();
        $categoryInfo = Categories::where('id', $id)->first();
        if ($categoryInfo->category_photo) {
            unlink('uploads/category_photos/' . $categoryInfo->category_photo);
        }
        $Image = new ImageManager(new Driver());
        $new_name = Str::random(5) . time() . "." . $this->categoryUpdateImage->getClientOriginalExtension();
        $image = $Image->read($this->categoryUpdateImage)->resize(720, 540);
        $image->save(('uploads/category_photos/' . $new_name), quality: 80);
        $tag = "#" . str::slug($this->categoryName);
        Categories::where('id', $id)->update([
            'category_name' => $this->categoryName,
            'category_tag' => $tag,
        ]);
        if ($this->categoryDescription) {
            Categories::where('id', $id)->update([
                'category_description' => $this->categoryDescription,
            ]);
        };
        if ($this->categoryUpdateImage) {
            Categories::where('id', $id)->update([
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
