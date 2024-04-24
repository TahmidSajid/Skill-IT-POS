<?php

namespace App\Livewire\Pages\Users\Moderator;

use Livewire\Attributes\Validate;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Component;

class AddModerator extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $name, $email , $phone ;
    public $photo ;

    public function render()
    {
        return view('livewire.pages.users.moderator.add-moderator');
    }

    public function addModerator()
    {
        $this->validate();

        $password = "moderator";
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($password),
            'role' => 'moderator',
        ];
        $student_info = User::create($data);

        if($this->photo){
            $Image = new ImageManager(new Driver());
            $new_name = Str::random(5) . time() . "." . $this->photo->getClientOriginalExtension();
            $image = $Image->read($this->photo)->resize(540, 540);
            $image->save(('uploads/profile_photos/' . $new_name), quality: 80);
            User::where('id',$student_info->id)->update([
                'photo' => $new_name,
            ]);
        };

        // Mail::to($this->email)->send(new student_account($this->name,$this->email,$password));

        $this->dispatch('reloading');
        notyf()->addSuccess('Moderator added successfuly');
        $this->reset();
    }
}
