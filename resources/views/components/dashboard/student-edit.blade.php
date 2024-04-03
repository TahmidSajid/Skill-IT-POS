<div class="modal fade" id="exampleModal{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" wire:ignore>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit="update({{ $student->id }})">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="name" class="form-control" placeholder="Enter name" wire:model='name'>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Enter email" wire:model='email'>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="tel" class="form-control" placeholder="Enter phone" wire:model='phone'>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Current Profile Picture</label>
                            <img src="{{ asset('uploads/student_photos') }}/{{ $student->photo }}"
                                style="height:150px; width:150px;" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Picture</label>
                            <div class="image-upload image-upload-new">
                                <input type="file" wire:model='newPhoto'
                                    onchange="document.getElementById('proImg{{ $key }}').src = window.URL.createObjectURL(this.files[0])">
                                <div class="image-uploads" wire:ignore>
                                    <img src="{{ asset('assets') }}/img/icons/upload.svg"
                                        style="height:80px; width:80px;" id='proImg{{ $key }}' alt="img">
                                    <h4>Drag and drop a file to upload</h4>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"
                    onclick="document.getElementById('proImg').src = '{{ asset('assets') }}/img/icons/upload.svg' ">Save
                    changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
