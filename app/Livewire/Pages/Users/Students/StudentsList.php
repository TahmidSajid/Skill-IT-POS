<?php

namespace App\Livewire\Pages\Users\Students;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class StudentsList extends Component
{

    #[Computed]
    public function students(){
        return User::where('role','student')->get();
    }

    public function render()
    {
        return view('livewire.pages.users.students.students-list');
    }
}
