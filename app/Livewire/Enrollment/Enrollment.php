<?php

namespace App\Livewire\Enrollment;

use App\Models\Courses;
use App\Models\Students;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Enrollment extends Component
{
    use WithPagination;

    public $search;
    public $studentSearch;
    public $candidates = [];
    public $discount ;
    public $courseInfo ;
    public $installment ;
    public $payment;
    public $installmentPermit;

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
        return User::where('role','student')->where('name','LIKE',"%{$this->studentSearch}%")->paginate(6);
    }

    public function enrollStart($info){
        $this->courseInfo = $info;
        $this->installmentPermit = false;
    }

    public function enroll(){
        if($this->installment){
            if ($this->courseInfo['discount_price']) {
                $this->payment = $this->courseInfo['discount_price'] / $this->installment;
            }
            else{
                $this->payment = $this->courseInfo['price'] / $this->installment;
            }
        }
    }
}
