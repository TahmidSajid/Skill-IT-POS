<?php

namespace App\Livewire\Pages\Users\Students;

use App\Mail\student_account;
use App\Models\Students;
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
    public $name, $email , $mobile ;
    public $photo ;

    public function addStudents(){
        $this->validate();

        $password = strtoupper(Str::random(5));
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->mobile,
            'password' => Hash::make($password),
            'status' => 'incative',
            'role' => 'student',
        ];
        $student_info = Students::create($data);

        if($this->photo){
            $Image = new ImageManager(new Driver());
            $new_name = Str::random(5) . time() . "." . $this->photo->getClientOriginalExtension();
            $image = $Image->read($this->photo)->resize(540, 540);
            $image->save(('uploads/student_photos/' . $new_name), quality: 80);
            Students::where('id',$student_info->id)->update([
                'photo' => $new_name,
            ]);
        };

        Mail::to($this->email)->send(new student_account($this->name,$this->email,$password));

        notyf()->addSuccess('Student added successfuly');
        $this->reset();

    }
    public function render()
    {
        return view('livewire.pages.users.students.add-students');
    }
}
