<?php

namespace App\Livewire\Pages\Payment;

use App\Models\Enrollments;
use App\Models\Payments;
use Livewire\Component;

class IndividualPayment extends Component
{
    public $student;
    public $course;

    public function render()
    {
        $payments = Payments::where('user_id',$this->student->id)->where('course_id',$this->course->id)->get();
        $enrollments = Enrollments::where('user_id',$this->student->id)->where('course_id',$this->course->id)->first();
        return view('livewire.pages.payment.individual-payment',compact('enrollments','payments'));
    }
    public function pay($id)
    {
        Payments::where('id',$id)->update([
            'status' => 'paid',
        ]);
        notyf()->addSuccess('Your payment is complete');
    }
}
