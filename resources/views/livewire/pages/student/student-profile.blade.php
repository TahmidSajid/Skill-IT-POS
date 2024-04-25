<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-xl-4">

            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">

                    @if (auth()->user()->photo)
                        <img class="img-account-profile rounded-circle mb-2"
                            src="{{ asset('uploads/student_photos') }}/{{ auth()->user()->photo }}" alt>
                    @else
                        <img class="img-account-profile rounded-circle mb-2"
                            src="{{ asset('default_photos/default_profile.png') }}" alt>
                    @endif

                    <form wire:submit="profileImage">
                        <input class="form-control" type="file" wire:model="image">

                        <button class="btn btn-primary mt-4" type="submit">Upload new image</button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-8">

            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form wire:submit="profileUpdate">

                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username (how your name will appear to
                                other users on the site)</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="Enter your name"
                                wire:model="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" type="email"
                                placeholder="Enter your email address" wire:model="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row gx-3 mb-3">

                            <div class="col-md-12">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" id="inputPhone" type="tel"
                                    placeholder="Enter your phone number" wire:model="phone">

                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
