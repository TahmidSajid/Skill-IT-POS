<div class="card">
    <div class="card-body">
        <div class="row">
            <form wire:submit="addModerator">
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="name" class="form-control" placeholder="Enter name" wire:model='name'>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Enter email" wire:model='email'>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="tel" class="form-control" placeholder="Enter phone" wire:model='phone'>
                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="form-group">
                        <label>Picture</label>
                        <div class="image-upload image-upload-new">
                            <input type="file" wire:model='photo'
                                onchange="document.getElementById('proImg').src = window.URL.createObjectURL(this.files[0])">
                            <div class="image-uploads" wire:ignore>
                                <img src="{{ asset('assets') }}/img/icons/upload.svg" style="height:200px; width:200px;"
                                    id='proImg' alt="img">
                                <h4>Drag and drop a file to upload</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-submit me-2" type="submit" wire:loading.remove wire:target='addModerator'
                        onclick="document.getElementById('proImg').src = '{{ asset('assets') }}/img/icons/upload.svg' ">Submit</button>
                    <button class="btn btn-primary mb-1" type="button" disabled="" wire:loading wire:target='addModerator'>
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        <span class="sr-only">Loading...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
