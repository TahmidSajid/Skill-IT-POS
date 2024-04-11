<?php

namespace App\Livewire\Pages\Payment;

use Livewire\Component;

class IndividualPayment extends Component
{
    public $payments;
    public $student;
    public $course;

    public function render()
    {
        return view('livewire.pages.payment.individual-payment');
    }
}
