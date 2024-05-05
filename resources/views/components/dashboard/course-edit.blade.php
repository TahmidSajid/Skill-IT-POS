<form wire:submit='updateCourse({{ $course->id }})'>
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
                <option>Choose Category</option>
                @forelse ($this->categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @empty
                    <option>Nothing added yet</option>
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
            <select class="form-select" multiple {{ !$categoryId ? 'disabled' : '' }} wire:model.live="newSubCategory"
                aria-label="multiple select example">
                <option class="mb-2">Choose Sub Category</option>
                @if ($categoryId)
                    @forelse ($this->subcategories as $subcategory)
                        <option class="mb-2" value="{{ $subcategory->id }}"
                            @foreach ($subCategoryId as $id) @if ($id->subcategory_id == $subcategory->id) selected @php break @endphp @endif @endforeach>
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
            <input type="number" class="form-control @error('cost') is-invalid @enderror" wire:model="cost">
        </div>
        @error('cost')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-lg-12 col-sm-6 col-12">
        <div class="form-group my-4 mb-2">
            <label>Price</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" wire:model="price" />
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
                <option value="closed" @if ($status == 'closed') selected @endif>Closed</option>
                <option value="open" @if ($status == 'open') selected @endif>Open</option>
            </select>
        </div>
        @error('status')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-lg-12">
        <div class="form-group mt-4 mb-2">
            <label>Current Course Image</label>
            <img src="{{ asset('uploads/course_photos') }}/{{ $courseImage }}" class=""
                style="height: 100px; width:100px;" id="courseImg" alt="img">
        </div>
    </div>
    @error('courseImage')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    </div>
    <div class="col-lg-12">
        <div class="form-group mt-4 mb-2">
            <label> Course Image</label>
            <div class="image-upload mb-3">
                <input type="file" class="form-control @error('courseImage') is-invalid @enderror"
                    wire:model="newCourseImage"
                    onchange="document.getElementById('courseImg{{ $key }}').src = window.URL.createObjectURL(this.files[0]);" />
                <div class="image-uploads" wire:ignore>
                    <img src="{{ asset('assets') }}/img/icons/upload.svg" class=""
                        style="height: 50px; width:50px;" id="courseImg{{ $key }}" alt="img">
                    <h4>Drag and drop a file to upload</h4>
                </div>
            </div>
        </div>
        @error('courseImage')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-lg-12">
        <button type="submit" class="btn btn-submit me-2 mt-2" data-bs-dismiss="modal">Submit</button>
    </div>
</form>
