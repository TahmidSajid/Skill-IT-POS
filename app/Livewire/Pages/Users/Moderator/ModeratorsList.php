<?php

namespace App\Livewire\Pages\Users\Moderator;

use Livewire\Attributes\Validate;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class ModeratorsList extends Component
{
    use WithFileUploads;
    use WithPagination;

    #[Validate('required')]
    public $name, $email , $phone ;
    public $currentPhoto ;
    public $newPhoto ;

    public function render()
    {
        return view('livewire.pages.users.moderator.moderators-list');
    }

    #[On('reloading')]
    public function recheck(){
        unset($this->moderators);
    }

    #[Computed]
    public function moderators()
    {
        return User::where('role','!=','student')->paginate(7);
    }

    public function edit($id){
        $mode_Info = User::where('id',$id)->first();
        $this->name = $mode_Info->name;
        $this->email = $mode_Info->email;
        $this->phone = $mode_Info->phone;
        $this->currentPhoto = $mode_Info->photo;
    }
    public function update($id){
        $this->validate();


        User::where('id',$id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        if($this->newPhoto){
            if($this->currentPhoto){
                unlink('uploads/profile_photos/'.$this->currentPhoto);
            }
            $Image = new ImageManager(new Driver());
            $new_name = Str::random(5) . time() . "." . $this->newPhoto->getClientOriginalExtension();
            $image = $Image->read($this->newPhoto)->resize(540, 540);
            $image->save(('uploads/profile_photos/' . $new_name), quality: 80);
            User::where('id',$id)->update([
                'photo' => $new_name,
            ]);
        };

        $this->dispatch('reloading');
        notyf()->addSuccess('Moderator updated');
        $this->reset();
    }

    public function delete($id){
        $studentInfo = User::where('id',$id)->first();
        if($studentInfo->photo){
            unlink('uploads/profile_photos/'.$studentInfo->photo);
        };
        User::where('id',$id)->delete();
        notyf()->addError('Moderator deleted');
    }

    public function makeAdmin($id)
    {
        User::where('id',$id)->update([
            'role' => 'admin'
        ]);

        notyf()->addSuccess('Role changed to admin');

    }

    public function makeModerator($id)
    {
        User::where('id',$id)->update([
            'role' => 'moderator'
        ]);

        notyf()->addSuccess('Role changed to moderator');

    }
}
