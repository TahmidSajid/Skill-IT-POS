<?php

namespace App\Livewire\Pages\Dashboard;

use Livewire\Component;
use Livewire\Attributes\On;

class DashboardPanel extends Component
{
    public $userName;

    public $userRole;


    #[On('reloading')]
    public function boot(){
        $this->userName = auth()->user()->name;
        $this->userRole = auth()->user()->role;
    }
    public function render()
    {
        return view('livewire.pages.dashboard.dashboard-panel');
    }
}
