<div class="card">
    <div class="card-body">
        <div class="row">
            <form wire:submit='addCourse' method="">
                <div class="col-lg-12 col-sm-6 col-12">
                    <div class="form-group mb-2">
                        <label>Course Name</label>
                        <input type="text" class="form-control @error('courseName') is-invalid @enderror "
                            wire:model="courseName" />
                    </div>
                    @error('courseName')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-lg-12 col-sm-6 col-12">
                    <div class="form-group mt-4 mb-2">
                        <label>Category</label>
                        <select class="form-select" wire:model.live="categoryId">
                            <option value="">Choose Category</option>
                            @forelse ($this->categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @empty
                                <option value="">Nothing added yet</option>
                            @endforelse
                        </select>
                    </div>
                    @error('categoryId')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-lg-12 col-sm-6 col-12">
                    <div class="form-group mt-4 mb-2">
                        <label>Sub Category</label>
                        <select class="form-select" multiple {{ !$categoryId ? 'disabled' : '' }}
                            wire:model.live="subCategoryId" aria-label="multiple select example">
                            <option class="mb-2">Choose Sub Category</option>
                            @if ($categoryId)
                                @forelse ($this->subcategories as $subcategory)
                                    <option class="mb-2" value="{{ $subcategory->id }}">
                                        {{ $subcategory->category_name }}</option>
                                @empty
                                    <option>Nothing added yet</option>
                                @endforelse
                            @endif
                        </select>
                        <p>to select multiple (crlt+click) </p>
                    </div>
                    @error('subCategoryId')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-lg-12">
                    <div class="form-group mt-4 mb-2">
                        <label>Description</label>
                        <textarea class="form-control" class="form-control @error('description') is-invalid @enderror" wire:model="description"></textarea>
                    </div>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-lg-12 col-sm-6 col-12">
                    <div class="form-group mt-4 mb-2">
                        <label>Cost</label>
                        <input type="number" class="form-control @error('cost') is-invalid @enderror"
                            wire:model="cost">
                    </div>
                    @error('cost')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-lg-12 col-sm-6 col-12">
                    <div class="form-group my-4 mb-2">
                        <label>Price</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                            wire:model="price" />
                    </div>
                    @error('price')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-lg-12 col-sm-6 col-12">
                    <div class="form-group mt-4 mb-2">
                        <label>Discount Price</label>
                        <input type="number" class="form-control @error('discountPrice') is-invalid @enderror"
                            wire:model="discountPrice" />
                    </div>
                    @error('discountPrice')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-lg-12 col-sm-6 col-12">
                    <div class="form-group mt-4 mb-2">
                        <label> Status</label>
                        <select class="form-select" wire:model="status">
                            <option value="closed">Closed</option>
                            <option value="open">Open</option>
                        </select>
                    </div>
                    @error('status')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-lg-12">
                    <div class="form-group mt-4 mb-2">
                        <label> Course Image</label>
                        <div class="image-upload mb-3">
                            <input type="file" class="form-control @error('courseImage') is-invalid @enderror"
                                wire:model="courseImage"
                                onchange="document.getElementById('courseImg').src = window.URL.createObjectURL(this.files[0]);" />
                            <div class="image-uploads" wire:ignore>
                                <img src="{{ asset('assets') }}/img/icons/upload.svg" class=""
                                    style="height: 50px; width:50px;" id="courseImg" alt="img">
                                <h4>Drag and drop a file to upload</h4>
                            </div>
                        </div>
                    </div>
                    @error('courseImage')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-submit me-2 mt-2" onclick="document.getElementById('courseImg').src='{{ asset('assets') }}/img/icons/upload.svg' ">Submit</button>
                </div>
            </form>
        </div>
    </div>
    {{ $discountPrice }}
</div>
@push('customeJS')
    <script src="{{ asset('assets') }}/plugins/select2/js/select2.min.js" type="text/javascript"></script>
@endpush
