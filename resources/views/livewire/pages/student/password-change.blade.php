<div class="card mb-4">
    <div class="card-header">Change password</div>
    <div class="card-body">
        <form wire:submit="changePass">
            <div class="mb-3">
                <label class="small mb-1">Old Password</label>
                <input class="form-control" type="password" placeholder="Enter your old password"
                    wire:model="oldPassword">
                @error('oldPassword')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @if (session('oldError'))
                    <span class="text-danger">{{ session('oldError') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label class="small mb-1">New Password</label>
                <input class="form-control" type="password"
                    placeholder="enter new password" wire:model="newPassword">
                @error('newPassword')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="small mb-1">Confirm Password</label>
                <input class="form-control" type="password"
                    placeholder="enter confirm password" wire:model="confirmPassword">
                @error('confirmPassword')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @if (session('conError'))
                    <span class="text-danger">{{ session('conError') }}</span>
                @endif
            </div>
            <button class="btn btn-primary" type="submit">Save changes</button>
        </form>
    </div>
</div>
