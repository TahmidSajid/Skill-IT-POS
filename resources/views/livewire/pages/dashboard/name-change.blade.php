<div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Change your name</h5>
        </div>
        <div class="card-body">
            <form wire:submit="changeName">
                <div class="form-group row">
                    <label class="col-form-label col-md-3">New name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                            placeholder="Enter your new name" wire:model="name">
                        <div>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-6 text-end">
                        <button class="btn btn-primary" type="submit">Change name</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
