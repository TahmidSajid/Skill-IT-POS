<?php

namespace App\Livewire\Enrollment;

use App\Models\Courses;
use App\Models\Students;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;
use PhpParser\Node\Stmt\Return_;

class Enrollment extends Component
{
    public $search;
    public $studentSearch;
    public $candidates = [];

    public function render()
    {
        return view('livewire.enrollment.enrollment');
    }

    #[Computed]
    public function courses(){
        return Courses::where('course_name','LIKE',"%{$this->search}%")->get();
    }

    #[Computed]
    public function students(){
        return User::where('role','student')->where('name','LIKE',"%{$this->studentSearch}%")->get();
    }

    public function enroll(){
        dd($this->candidates);
    }
}
