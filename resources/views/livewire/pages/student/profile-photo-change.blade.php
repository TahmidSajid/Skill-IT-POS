<div class="card mb-4 mb-xl-0">
    <div class="card-header">Profile Picture</div>
    <div class="card-body text-center">
        @if (auth()->user()->photo)
            <img class="img-account-profile rounded-circle mb-2"
                src="{{ asset('uploads/student_photos') }}/{{ $this->profileImg }}" alt>
        @else
            <img class="img-account-profile rounded-circle mb-2" src="{{ asset('default_photos/default_profile.png') }}"
                alt>
        @endif
        <form wire:submit="profileImage">
            <input class="form-control" type="file" wire:model="image">
            @error('image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <button class="btn btn-primary mt-4" type="submit">Upload new image</button>
        </form>
    </div>
</div>
