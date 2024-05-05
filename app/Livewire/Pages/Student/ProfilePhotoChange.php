<?php

namespace App\Livewire\Pages\Student;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use App\Models\User;
use Intervention\Image\ImageManager;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;

class ProfilePhotoChange extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $image;

    public function render()
    {
        return view('livewire.pages.student.profile-photo-change');
    }

    #[On('recheck')]
    public function unset(){
        unset($this->profileImg);
    }

    #[Computed]
    public function profileImg()
    {
        return auth()->user()->photo;
    }

    public function profileImage()
    {
        $this->validate();

        if (auth()->user()->photo) {
            unlink('uploads/student_photos/' . auth()->user()->photo);
        }

        $Image = new ImageManager(new Driver());
        $new_name = Str::random(5) . time() . "." . $this->image->getClientOriginalExtension();
        $image = $Image->read($this->image)->resize(540, 540);
        $image->save(('uploads/student_photos/' . $new_name), quality: 80);
        User::where('id', auth()->user()->id)->update([
            'photo' => $new_name,
        ]);

        $this->reset('image');
        notyf()->addSuccess('Your profile picture is updated.');
        $this->dispatch('recheck');

    }
}
