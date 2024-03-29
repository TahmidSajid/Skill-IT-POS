<?php

namespace App\Livewire\Pages\Dashboard;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;

class PasswordChange extends Component
{
    #[Validate('required')]
    public $oldPassword = '';

    #[Validate('required')]
    public $Password = '';

    #[Validate('required')]
    public $passwordConfirmation = '';
    public function changePassword()
    {
        $this->validate();
        $userPassword = auth()->user()->password;
        if (Hash::check($this->oldPassword, $userPassword)) {
            if (($this->Password === $this->passwordConfirmation)) {
                User::where('id', auth()->user()->id)->update([
                    'password' => Hash::make($this->Password),
                ]);
                $this->dispatch('reloading');
                notyf()->addSuccess('Password has been updated.');
                $this->reset();
            }
            else{
                session()->flash('conPass', 'Confirm password doesnot match.');
            }
        }
        else{
            session()->flash('oldPass', 'Old password doesnot match.');
        }

    }
    public function render()
    {
        return view('livewire.pages.dashboard.password-change');
    }
}
