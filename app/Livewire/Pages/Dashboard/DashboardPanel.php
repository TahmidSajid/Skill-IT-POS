<?php

namespace App\Livewire\Pages\Dashboard;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
Use Illuminate\Support\Str;
use Livewire\Attributes\On;

class DashboardPanel extends Component
{
    use WithFileUploads;

    public $userName;

    public $userRole;

    public $profileImg;


    #[On('reloading')]
    public function boot(){
        $this->userName = auth()->user()->name;
        $this->userRole = auth()->user()->role;
    }
    public function saveImg(){

        if (auth()->user()->photo) {
            unlink('uploads/profile_photos/'.auth()->user()->photo);
        }
        $Image = new ImageManager(new Driver());
        $new_name = Str::random(5).time().".".$this->profileImg->getClientOriginalExtension();
        $image = $Image->read($this->profileImg)->resize(300,300);
        $image->save(('uploads/profile_photos/'.$new_name),quality: 80);
        User::where('id',auth()->user()->id)->update([
            'photo' => $new_name,
        ]);
        $this->reset('profileImg');
        notyf()->addSuccess('Your profile picture has been saved');
    }
    public function render()
    {
        return view('livewire.pages.dashboard.dashboard-panel');
    }
}
