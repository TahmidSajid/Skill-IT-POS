<div class="card">
    <div class="card-body">
        <form wire:submit="addCategory">
            <div class="row">
                <div class="col-lg-12 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" wire:model="categoryName">
                        @error('categoryName')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Description <span style="font-size: 10px">(Optional)</span></label>
                        <textarea class="form-control" wire:model="categoryDescription"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label> Category Image</label>
                        <div class="image-upload mb-0">
                            <input type="file" wire:model="categoryImage" onchange="document.getElementById('cateImg').src = window.URL.createObjectURL(this.files[0]);document.getElementById('cateImg').classList.toggle('d-none')">
                            <div class="image-uploads" wire:ignore>
                                <img src="{{ $categoryImage }}" class="d-none" style="height: 40px; width:70px;" id="cateImg" alt="img">
                                <h4>Drag and drop a file to upload</h4>
                            </div>
                        </div>
                        @error('categoryImage')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-submit me-2" type="submit" onclick="document.getElementById('cateImg').src ='';document.getElementById('cateImg').classList.toggle('d-none')">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

