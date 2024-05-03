<?php

namespace App\Livewire\Pages\Student;

use App\Models\User;
use Livewire\Attributes\Validate;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Intervention\Image\ImageManager;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class StudentProfile extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $name, $email, $phone;

    #[Validate('required|file')]
    public $image;

    #[On('reload')]
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

        notyf()->addSuccess('Your profile picture is updated.');

        $this->dispatch('reload');
    }


}
