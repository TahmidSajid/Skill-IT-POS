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
        /**
         * Retrieves a list of student enrollments based on the provided search criteria.
         *
         * If a search term is provided, the function will search for users by name or phone number and return the enrollments for the matching user(s). If no search term is provided, the function will return all enrollments.
         *
         * @param string|null $this->search The search term to use for filtering enrollments.
         * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|array The list of student enrollments.
         */
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
        /**
         * Deletes a student's enrollment, payments, and payment dates.
         *
         * This function is used to expel a student from a course. It first retrieves the enrollment
         * record for the given student ID, then deletes all payment records and associated payment
         * dates for that student and course. Finally, it deletes the enrollment record itself.
         *
         * @param int $id The ID of the enrollment record to delete.
         */
        $enrollment = Enrollments::where('id', $id)->first();
        $payment_info = Payments::where('user_id', $enrollment->user_id)->where('course_id', $enrollment->course_id)->get();

        foreach ($payment_info as $key => $value) {
            if (Dates::where('payment_id', $value->id)->exists()) {
                Dates::where('payment_id', $value->id)->delete();
            }
        }

        Payments::where('user_id', $enrollment->user_id)->where('course_id', $enrollment->course_id)->delete();

        Enrollments::where('id', $id)->delete();

        unset($this->students);

        notyf()->addError('Student Expelled.');
    }
}
