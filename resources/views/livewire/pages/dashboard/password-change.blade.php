<div class="card">
    <div class="card-header">
        <h5 class="card-title">change password</h5>
    </div>
    <div class="card-body">
        <form wire:submit="changePassword">
            <div class="form-group row">
                <label class="col-form-label col-md-3">Old password</label>
                <div class="col-md-9">
                    <input type="password" class="form-control form-control-lg" placeholder="Enter your old password"
                        wire:model="oldPassword">
                    <div>
                        @error('oldPassword')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-md-3">Password</label>
                <div class="col-md-9">
                    <input type="password" class="form-control form-control-lg" placeholder="Enter your new password"
                        wire:model="Password">
                    <div>
                        @error('Password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-md-3">confirm Password</label>
                <div class="col-md-9">
                    <input type="password" class="form-control form-control-lg" placeholder="Enter your confirm password"
                        wire:model="password_confirmation">
                    <div>
                        @error('password_confirmation')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        @if (session('conPass'))
                            <p class="text-danger">{{ session('conPass') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-md-6 text-end">
                    <button class="btn btn-primary" type="submit">Change password</button>
                </div>
            </div>
        </form>
    </div>
</div>
