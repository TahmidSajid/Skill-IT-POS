<?php

namespace App\Livewire\Pages\Dashboard;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;


class NameChange extends Component
{
    #[Validate('required')]
    public $name = '';

    public function changeName()
    {
        $this->validate();
        User::where('id', auth()->user()->id)->update([
            'name' => $this->name,
        ]);
        $this->dispatch('reloading');
        notyf()->addSuccess('Your application has been received.');
    }
    public function render()
    {
        return view('livewire.pages.dashboard.name-change');
    }
}
