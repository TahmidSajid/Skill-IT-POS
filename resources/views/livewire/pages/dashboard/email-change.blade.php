<div>
    @if ($mailSent == false)
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Change your Email</h5>
            </div>
            <div class="card-body">
                <form wire:submit="changeEmail">
                    <div class="form-group row">
                        <label class="col-form-label col-md-3">New email</label>
                        <div class="col-md-9">
                            <input type="email"
                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                placeholder="Enter your new email" wire:model="email">
                            <div>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-6 text-end">
                            <button class="btn btn-primary" type="submit">Change email</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">OTP verify</h5>
            </div>
            <div class="card-body">
                <form wire:submit="confirmOTP">
                    <div class="form-group row">
                        <label class="col-form-label col-md-3">Verify OTP</label>
                        <div class="col-md-9">
                            <input type="text"
                                class="form-control form-control-lg @error('confirmOtp') is-invalid @enderror"
                                placeholder="Enter OTP" wire:model="confirmOtp">
                            <div>
                                @error('confirmOtp')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-6 text-end">
                            <button class="btn btn-primary" type="submit">Verify</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
