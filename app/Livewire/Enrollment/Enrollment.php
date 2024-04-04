<?php

namespace App\Livewire\Enrollment;

use App\Models\Courses;
use Livewire\Attributes\Computed;
use Livewire\Component;
use PhpParser\Node\Stmt\Return_;

class Enrollment extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.enrollment.enrollment');
    }

    #[Computed]
    public function courses(){
        return $courses = Courses::where('course_name','LIKE',"%{$this->search}%")->get();
    }
}
