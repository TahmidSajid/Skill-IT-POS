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
                            <input type="file" wire:model="categoryImage"
                                onchange="document.getElementById('cateImg').src = window.URL.createObjectURL(this.files[0]);">
                            @if ($categoryImage != null)
                                <div class="image-uploads" wire:ignore>
                                    <img src="{{ $categoryImage }}" class="" style="height: 50px; width:50px;"
                                        id="cateImg" alt="img">
                                    <h4>Drag and drop a file to upload</h4>
                                </div>
                            @else
                                <div class="image-uploads" wire:ignore>
                                    <img src="{{ asset('assets') }}/img/icons/upload.svg" class=""
                                        style="height: 50px; width:50px;" id="cateImg" alt="img">
                                    <h4>Drag and drop a file to upload</h4>
                                </div>
                            @endif
                        </div>
                        @error('categoryImage')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-submit me-2" type="submit" wire:loading.remove
                        onclick="document.getElementById('cateImg').src ='{{ asset('assets') }}/img/icons/upload.svg';" wire:target="addCategory">Submit</button>
                    <button class="btn btn-primary mb-1" type="button" disabled="" wire:loading
                        wire:target="addCategory">
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        <span class="sr-only">Loading...</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
