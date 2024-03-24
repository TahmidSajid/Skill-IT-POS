<?php

namespace App\Livewire\Pages\Course\Category;

use App\Models\Categories;
use Livewire\Attributes\Computed;
use Livewire\Component;

class CategoryList extends Component
{
    #[Computed()]
    public function categories(){
        return Categories::all();
    }
    public function render()
    {
        return view('livewire.pages.course.category.category-list');
    }
}
