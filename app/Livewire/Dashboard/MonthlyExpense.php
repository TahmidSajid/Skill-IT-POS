<?php

namespace App\Livewire\Dashboard;

use App\Models\Dates;
use App\Models\Expenses;
use App\Models\Payments;
use Livewire\Attributes\Computed;
use Livewire\Component;

class MonthlyExpense extends Component
{
    public $date;

    public function render()
    {
        return view('livewire.dashboard.monthly-expense');
    }

    #[Computed]
    public function dates(){
        return Dates::select('date')->distinct()->get();
    }

    #[Computed]
    public function expenses(){
        if ($this->date) {
            return Expenses::where('date',$this->date)->get();
        }
        else{
            return [];
        }
    }

    #[Computed]
    public function payments(){
        if ($this->date) {
            return Payments::where('date',$this->date)->get();
        }
        else{
            return [];
        }
    }

    #[Computed]
    public function totalExpense()
    {
        if ($this->expenses != []) {
            $total = 0;
            foreach ($this->expenses as $key => $value) {
                $total = $total + $value->expense;
            }
            return $total;
        }
        else {
            return 0;
        }
    }

    #[Computed]
    public function totalPayments()
    {
        if ($this->payments != []) {
            $total = 0;
            foreach ($this->payments as $key => $value) {
                $total = $total + $value->payment;
            }
            return $total;
        }
        else {
            return 0;
        }
    }

}
