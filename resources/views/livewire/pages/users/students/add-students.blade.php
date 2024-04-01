<div>


    <div class="card">
        <div class="card-body">
            <div class="row">
                <form wire:submit="addStudents">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" wire:model='name'>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" wire:model='email'>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" wire:model='mobile'>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Picture</label>
                            <div class="image-upload image-upload-new">
                                <input type="file" wire:model='photo'>
                                <div class="image-uploads">
                                    <img src="assets/img/icons/upload.svg" alt="img">
                                    <h4>Drag and drop a file to upload</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-submit me-2" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
