<?php

namespace App\Livewire\Pages\Users\Students;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class StudentsList extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $name, $email , $phone ;
    public $currentPhoto ;
    public $newPhoto ;

    #[On('reloading')]
    public function recheck(){
        unset($this->students);
    }

    #[Computed]
    public function students(){
        return User::where('role','student')->get();
    }

    public function edit($id){
        $studentInfo = User::where('id',$id)->first();
        $this->name = $studentInfo->name;
        $this->email = $studentInfo->email;
        $this->phone = $studentInfo->phone;
        $this->currentPhoto = $studentInfo->photo;
    }

    public function update($id){
        $this->validate();


        User::where('id',$id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        if($this->newPhoto){
            unlink('uploads/student_photos/'.$this->currentPhoto);
            $Image = new ImageManager(new Driver());
            $new_name = Str::random(5) . time() . "." . $this->newPhoto->getClientOriginalExtension();
            $image = $Image->read($this->newPhoto)->resize(540, 540);
            $image->save(('uploads/student_photos/' . $new_name), quality: 80);
            User::where('id',$id)->update([
                'photo' => $new_name,
            ]);
        };

        $this->dispatch('reloading');
        notyf()->addSuccess('Student updated');
        $this->reset();
    }


    public function delete($id){
        $studentInfo = User::where('id',$id)->first();
        if($studentInfo->photo){
            unlink('uploads/student_photos/'.$studentInfo->photo);
        };
        User::where('id',$id)->delete();
        notyf()->addError('Student deleted');
    }

    public function render()
    {
        return view('livewire.pages.users.students.students-list');
    }
}
