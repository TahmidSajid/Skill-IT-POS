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
use Livewire\WithPagination;

class StudentsList extends Component
{
    use WithPagination;
    use WithFileUploads;

    #[Validate('required')]
    public $name, $email, $phone;
    public $currentPhoto;
    public $newPhoto;

    public $search;

    #[On('reloading')]
    public function recheck()
    {
        unset($this->students);
    }

    #[Computed]
    public function students()
    {
        /**
         * Retrieves a paginated list of students based on the search query.
         *
         * If a search query is provided, the method will return a paginated list of students
         * where the name contains the search query. Otherwise, it will return a paginated
         * list of all students.
         *
         * @param string|null $search The search query to filter the students by name.
         * @return \Illuminate\Pagination\LengthAwarePaginator A paginated list of students.
         */
        if ($this->search) {
            return User::where('role', 'student')->where('name', 'like', '%' . $this->search . '%')->paginate(5);
        } else {
            return User::where('role', 'student')->paginate(5);
        }
    }

    public function edit($id)
    {
        /**
         * Retrieves the student information from the database and assigns the values to the corresponding properties.
         *
         * @param int $id The ID of the student to retrieve.
         * @return void
         */
        $studentInfo = User::where('id', $id)->first();
        $this->name = $studentInfo->name;
        $this->email = $studentInfo->email;
        $this->phone = $studentInfo->phone;
        $this->currentPhoto = $studentInfo->photo;
    }

    public function update($id)
    {
        /**
         * Updates the student information in the database.
         *
         * This method first validates the input data using the `$this->validate()` method.
         * It then updates the student's name, email, and phone number in the `users` table.
         *
         * If a new photo is provided, it first deletes the current photo (if any) and then saves the new photo to the `uploads/student_photos` directory.
         * The new photo's filename is generated using a random string and the current timestamp.
         *
         * After the update, the method dispatches a 'reloading' event and displays a success notification.
         * Finally, it resets the form fields.
         *
         * @param int $id The ID of the student to be updated.
         */
        $this->validate();


        User::where('id', $id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        if ($this->newPhoto) {
            if ($this->currentPhoto) {
                unlink('uploads/student_photos/' . $this->currentPhoto);
            }
            $Image = new ImageManager(new Driver());
            $new_name = Str::random(5) . time() . "." . $this->newPhoto->getClientOriginalExtension();
            $image = $Image->read($this->newPhoto)->resize(540, 540);
            $image->save(('uploads/student_photos/' . $new_name), quality: 80);
            User::where('id', $id)->update([
                'photo' => $new_name,
            ]);
        };

        $this->dispatch('reloading');
        notyf()->addSuccess('Student updated');
        $this->reset();
    }


    public function delete($id)
    {
        /**
         * Deletes a student record from the database.
         *
         * This code first retrieves the student information by their ID, and if the student has a photo uploaded, it deletes the photo file from the 'uploads/student_photos' directory. Then, it deletes the student record from the database. Finally, it displays an error notification to the user.
         */
        $studentInfo = User::where('id', $id)->first();
        if ($studentInfo->photo) {
            unlink('uploads/student_photos/' . $studentInfo->photo);
        };
        User::where('id', $id)->delete();
        notyf()->addError('Student deleted');
    }

    public function render()
    {
        return view('livewire.pages.users.students.students-list');
    }
}
