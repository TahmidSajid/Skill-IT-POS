<?php

namespace App\Livewire\Pages\Student;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Hash;

class PasswordChange extends Component
{
    #[Validate('required')]
    public $oldPassword;

    #[Validate('required')]
    public $newPassword;

    #[Validate('required')]
    public $confirmPassword;

    public function render()
    {
        return view('livewire.pages.student.password-change');
    }
    public function changePass()
    {
        $this->validate();

        $userPassword = auth()->user()->password;

        if (Hash::check($this->oldPassword, $userPassword)) {
            if ($this->newPassword === $this->confirmPassword) {
                User::where('id', auth()->user()->id)->update([
                    'password' => Hash::make($this->newPassword),
                ]);
                notyf()->addSuccess('Password changed successfully.');
                $this->reset();
            } else {
                session()->flash('conError', 'confirm password doesnot match');
            }
        } else {
            session()->flash('oldError', 'old password doesnot match');
        }
    }
}
