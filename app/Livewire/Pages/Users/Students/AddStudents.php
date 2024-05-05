<?php

namespace App\Livewire\Pages\Users\Students;

use App\Mail\student_account;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Drivers\Gd\Driver;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class AddStudents extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $name, $email, $phone;
    public $photo;

    public function addStudents()
    {
        /**
         * Validates the input data, creates a new student user, and sends a welcome email.
         *
         * This method is called when the "Add Student" form is submitted. It performs the following steps:
         * 1. Validates the input data using the `$this->validate()` method.
         * 2. Generates a random password for the new student.
         * 3. Prepares the user data array with the provided name, email, phone, hashed password, and default status and role.
         * 4. Creates a new user record using the `User::create()` method.
         * 5. If a photo is provided, it resizes the image and saves it to the `uploads/student_photos/` directory, updating the user record with the new photo filename.
         * 6. Sends a welcome email to the new student using the `Mail::to()` and `student_account` mailable.
         * 7. Dispatches a 'reloading' event to notify other components.
         * 8. Displays a success notification using the `notyf()->addSuccess()` method.
         * 9. Resets the form fields using the `$this->reset()` method.
         */
        $this->validate();

        $password = strtoupper(Str::random(5));
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($password),
            'status' => 'incative',
            'role' => 'student',
        ];
        $student_info = User::create($data);

        if ($this->photo) {
            $Image = new ImageManager(new Driver());
            $new_name = Str::random(5) . time() . "." . $this->photo->getClientOriginalExtension();
            $image = $Image->read($this->photo)->resize(540, 540);
            $image->save(('uploads/student_photos/' . $new_name), quality: 80);
            User::where('id', $student_info->id)->update([
                'photo' => $new_name,
            ]);
        };

        Mail::to($this->email)->send(new student_account($this->name, $this->email, $password));

        $this->dispatch('reloading');
        notyf()->addSuccess('Student added successfuly');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.pages.users.students.add-students');
    }
}
