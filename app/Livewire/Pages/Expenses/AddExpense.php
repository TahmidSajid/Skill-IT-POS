<?php

namespace App\Livewire\Pages\Expenses;

use App\Models\Courses;
use App\Models\Expenses;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Carbon;
use Livewire\Component;

class AddExpense extends Component
{
    #[Validate('required')]
    public $courseId,$expense,$date;

    public function render()
    {
        return view('livewire.pages.expenses.add-expense');
    }

    #[Computed]
    public function courses()
    {
        return Courses::all();
    }

    public function addExpenses()
    {
        $this->validate();

        Expenses::insert([
            'course_id' => $this->courseId,
            'expense' => $this->expense,
            'date' => $this->date,
            'created_at' => Carbon::now(),
        ]);

        notyf()->addSuccess('Expenses added.');
        $this->dispatch('reloading');
        $this->reset();
    }
}
