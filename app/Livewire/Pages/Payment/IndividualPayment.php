<?php

namespace App\Livewire\Pages\Payment;

use App\Models\Dates;
use App\Models\Enrollments;
use App\Models\Payments;
use Carbon\Carbon;
use Livewire\Component;

class IndividualPayment extends Component
{
    public $student;
    public $course;
    public $date;

    public function render()
    {
        $payments = Payments::where('user_id', $this->student->id)->where('course_id', $this->course->id)->get();
        $enrollments = Enrollments::where('user_id', $this->student->id)->where('course_id', $this->course->id)->first();
        return view('livewire.pages.payment.individual-payment', compact('enrollments', 'payments'));
    }
    public function pay($id)
    {
        /**
         * Updates the payment status, date, and creates a new date record for the payment.
         * If there are no more unpaid payments for the student and course, updates the enrollment payment status to 'paid'.
         * Displays a success notification.
         *
         * @param int $id The ID of the payment to update.
         * @param string $date The date of the payment.
         * @param \App\Models\User $student The student associated with the payment.
         * @param \App\Models\Course $course The course associated with the payment.
         */
        Payments::where('id', $id)->update([
            'status' => 'paid',
            'date' => $this->date,
        ]);

        Dates::insert([
            'date' => $this->date,
            'payment_id' => $id,
            'created_at' => Carbon::now(),
        ]);

        if (!Payments::where('user_id', $this->student->id)->where('course_id', $this->course->id)->where('status', 'unpaid')->exists()) {
            Enrollments::where('user_id', $this->student->id)->where('course_id', $this->course->id)->update([
                'payment' => 'paid'
            ]);
        };
        notyf()->addSuccess('Your payment is complete');
    }
}
