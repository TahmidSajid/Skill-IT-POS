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
    public $name, $email, $phone;
    public $currentPhoto;
    public $newPhoto;

    public $search;

    public function render()
    {
        return view('livewire.pages.users.moderator.moderators-list');
    }

    #[On('reloading')]
    public function recheck()
    {
        unset($this->moderators);
    }

    #[Computed]
    public function moderators()
    {
        /**
         * Retrieves a paginated list of moderators, optionally filtered by a search term.
         *
         * If a search term is provided, the method will return a paginated list of users
         * where the user's name contains the search term and the user's role is not 'student'.
         * Otherwise, it will return a paginated list of all users where the user's role is
         * not 'student'.
         *
         * @param string|null $search The search term to filter the list of moderators.
         * @return \Illuminate\Pagination\LengthAwarePaginator A paginated list of moderators.
         */
        if ($this->search) {
            return User::where('role', '!=', 'student')->where('name', 'like', '%' . $this->search . '%')->paginate(7);
        } else {
            return User::where('role', '!=', 'student')->paginate(7);
        }
    }

    public function edit($id)
    {
        /// Retrieves the moderator information from the database and assigns the values to the corresponding properties.
        /// This code is used within the `update()` method to pre-populate the form fields with the existing moderator data.
        /// @param int $id The ID of the moderator to retrieve.
        /// @return void
        $mode_Info = User::where('id', $id)->first();
        $this->name = $mode_Info->name;
        $this->email = $mode_Info->email;
        $this->phone = $mode_Info->phone;
        $this->currentPhoto = $mode_Info->photo;
    }
    public function update($id)
    {
        /**
         * Updates the information for a moderator user.
         *
         * @param int $id The ID of the moderator user to update.
         * @return void
         */
        $this->validate();


        User::where('id', $id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        if ($this->newPhoto) {
            if ($this->currentPhoto) {
                unlink('uploads/profile_photos/' . $this->currentPhoto);
            }
            $Image = new ImageManager(new Driver());
            $new_name = Str::random(5) . time() . "." . $this->newPhoto->getClientOriginalExtension();
            $image = $Image->read($this->newPhoto)->resize(540, 540);
            $image->save(('uploads/profile_photos/' . $new_name), quality: 80);
            User::where('id', $id)->update([
                'photo' => $new_name,
            ]);
        };

        $this->dispatch('reloading');
        notyf()->addSuccess('Moderator updated');
        $this->reset();
    }

    public function delete($id)
    {
        /**
         * Deletes a moderator user and removes their profile photo.
         *
         * @param int $id The ID of the moderator user to delete.
         * @return void
         */
        $studentInfo = User::where('id', $id)->first();
        if ($studentInfo->photo) {
            unlink('uploads/profile_photos/' . $studentInfo->photo);
        };
        User::where('id', $id)->delete();
        notyf()->addError('Moderator deleted');
    }

    public function makeAdmin($id)
    {
        User::where('id', $id)->update([
            'role' => 'admin'
        ]);

        notyf()->addSuccess('Role changed to admin');
    }

    public function makeModerator($id)
    {
        User::where('id', $id)->update([
            'role' => 'moderator'
        ]);

        notyf()->addSuccess('Role changed to moderator');
    }
}
