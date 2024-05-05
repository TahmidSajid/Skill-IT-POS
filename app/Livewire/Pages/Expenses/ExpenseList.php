<?php

namespace App\Livewire\Pages\Expenses;

use App\Models\Expenses;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use App\Models\Courses;
use App\Models\Dates;
use Livewire\Attributes\On;
use Carbon\Carbon;
use Livewire\Component;

class ExpenseList extends Component
{
    #[Validate('required')]
    public $courseId, $expense, $date, $courseName;

    public function render()
    {
        return view('livewire.pages.expenses.expense-list');
    }

    #[On('reloading')]
    public function recheck()
    {
        unset($this->expenses);
    }

    #[Computed]
    public function expenses()
    {
        return Expenses::all();
    }

    #[Computed]
    public function courses()
    {
        return Courses::all();
    }

    public function delete($id)
    {
        Expenses::where('id', $id)->delete();
        Dates::where('expense_id', $id)->delete();

        notyf()->addError('Expenses Deleted.');
    }

    public function edit($id)
    {
        /**
         * Retrieves the expense information for the given expense ID and populates the corresponding properties.
         *
         * @param int $id The ID of the expense to retrieve.
         */
        $expenseInfo = Expenses::where('id', $id)->first();
        $this->courseId = $expenseInfo->course_id;
        $this->expense = $expenseInfo->expense;
        $this->date = $expenseInfo->date;
        $this->courseName = $expenseInfo->getCourse->course_name;
    }

    public function update($id)
    {
        /**
         * Updates the expense and related date records for the specified expense ID.
         *
         * @param int $id The ID of the expense to update.
         * @return void
         */
        Expenses::where('id', $id)->update([
            'course_id' => $this->courseId,
            'expense' => $this->expense,
            'date' => $this->date,
            'updated_at' => Carbon::now(),
        ]);

        Dates::where('expense_id', $id)->update([
            'date' => $this->date,
            'updated_at' => Carbon::now(),
        ]);

        notyf()->addSuccess('Expenses Updated.');
    }
}
