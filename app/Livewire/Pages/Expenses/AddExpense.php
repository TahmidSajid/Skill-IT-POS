<?php

namespace App\Livewire\Pages\Expenses;

use App\Models\Courses;
use App\Models\Dates;
use App\Models\Expenses;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Carbon;
use Livewire\Component;

class AddExpense extends Component
{
    #[Validate('required')]
    public $courseId, $expense, $date;

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
        /**
         * Validates the input data, creates a new expense record, and inserts a new date record associated with the expense.
         *
         * @return void
         */
        $this->validate();

        $data = [
            'course_id' => $this->courseId,
            'expense' => $this->expense,
            'date' => $this->date,
        ];

        $expense =  Expenses::create($data);

        Dates::insert([
            'expense_id' => $expense->id,
            'date' => $this->date,
            'created_at' => Carbon::now(),
        ]);

        notyf()->addSuccess('Expenses added.');
        $this->dispatch('reloading');
        $this->reset();
    }
}
