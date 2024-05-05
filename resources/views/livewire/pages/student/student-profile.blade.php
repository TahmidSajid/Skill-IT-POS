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
                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address"
                    wire:model="email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="row gx-3 mb-3">

                <div class="col-md-12">
                    <label class="small mb-1" for="inputPhone">Phone number</label>
                    <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number"
                        wire:model="phone">

                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Save changes</button>
        </form>
    </div>
</div>

