<form wire:submit="updateCategory({{ $category->id }})">
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
                <label>Description <span
                        style="font-size: 10px">(Optional)</span></label>
                <textarea class="form-control" wire:model="categoryDescription"></textarea>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Current Category Image</label>
                <div class="image-uploads">
                    <img src="{{ asset('uploads/category_photos') }}/{{ $imagePreview }}"
                        style="height:250px; width:250px;"
                        alt="img">
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label> Category Image</label>
                <div class="image-upload mb-0">
                    <input type="file"
                        wire:model="categoryUpdateImage"
                        onchange="document.getElementById('cateImgUpdate{{ $key }}').src = window.URL.createObjectURL(this.files[0]);">
                    <div class="image-uploads" wire:ignore>
                        <img src="{{ asset('assets') }}/img/icons/upload.svg"
                            style="height: 50px; width:50px;"
                            id="cateImgUpdate{{ $key }}" alt="img">
                        <h4>Drag and drop a file to upload</h4>
                    </div>
                </div>
                @error('categoryUpdateImage')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <button class="btn btn-primary" class="btn btn-submit me-2"
        data-bs-dismiss="modal" type="submit">Save
    </button>
</form>
