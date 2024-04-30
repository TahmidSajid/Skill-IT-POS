<?php

namespace App\Livewire\Pages\Payment;

use App\Models\Dates;
use App\Models\Enrollments;
use App\Models\Payments;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class StudentPaymentList extends Component
{
    public $search;

    #[On('reload')]
    public function render()
    {
        return view('livewire.pages.payment.student-payment-list');
    }

    #[On('reload')]
    public function recheck()
    {
        unset($this->students);
    }

    #[Computed]
    public function students()
    {
        if ($this->search) {
            $x = User::where('name', 'like', '%' . $this->search . '%')->orWhere('phone', 'like', '%' . $this->search . '%')->first();
            if ($x != []) {
                return Enrollments::where('user_id', $x->id)->get();
            } else {
                return [];
            }
        } else {
            return Enrollments::all();
        }
    }


    public function expel($id)
    {
        $enrollment = Enrollments::where('id', $id)->first();
        $payment_info = Payments::where('user_id', $enrollment->user_id)->where('course_id', $enrollment->course_id)->get();

        foreach ($payment_info as $key => $value) {
            if (Dates::where('payment_id', $value->id)->exists()) {
                Dates::where('payment_id', $value->id)->delete();
            }
        }

        Payments::where('user_id', $enrollment->user_id)->where('course_id', $enrollment->course_id)->delete();

        Enrollments::where('id',$id)->delete();

        unset($this->students);

        notyf()->addError('Student Expelled.');
    }
}
