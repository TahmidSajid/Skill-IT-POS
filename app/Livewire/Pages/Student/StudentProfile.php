<?php

namespace App\Livewire\Pages\Student;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class StudentProfile extends Component
{

    #[Validate('required')]
    public $name, $email, $phone;

    public function boot()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->phone = auth()->user()->phone;
    }

    public function render()
    {
        return view('livewire.pages.student.student-profile');
    }

    public function profileUpdate()
    {

        $this->validate();

        User::where('id', auth()->user()->id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        notyf()->addSuccess('Your profile is updated.');
    }
}
