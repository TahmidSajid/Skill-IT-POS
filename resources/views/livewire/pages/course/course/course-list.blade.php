<div class="card">
    <div class="card-body">
        <div class="">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <label class="checkboxs">
                                <input type="checkbox" id="select-all">
                                <span class="checkmarks"></span>
                            </label>
                        </th>
                        <th>Course name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Cost</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->courses as $key => $course)
                        <tr>
                            <td>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>
                            <td class="productimgname">
                                <a href="javascript:void(0);" class="product-img">
                                    <img src="{{ asset('uploads/course_photos') }}/{{ $course->course_image }}"
                                        alt="product">
                                </a>
                                <a href="javascript:void(0);">{{ $course->course_name }}</a>
                            </td>
                            <td>{{ $course->getCategory->category_name}}</td>
                            {{-- <td>{{ $category->description }}</td> --}}
                            <td>{{ $course->cost }}</td>
                            <td>{{ $course->price }}</td>
                            <td>{{ $course->discount_price }}</td>
                            <td>{{ $course->status }}</td>
                            <td>
                                {{-- <button style="background: none; border:0px" class="me-3 confirm-text"type="button"
                                    class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $key }}"
                                    wire:click="edit({{ $category->id }})">
                                    <img src="assets/img/icons/edit.svg" alt="img">
                                </button>
                                <!-- Modal -->
                                <div wire:ignore.self class="modal fade" id="exampleModal{{ $key }}"
                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Updateing form Start
                                                ================================================== -->
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
                                                                <label>Category Image</label>
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
                                                                    <input type="file" wire:model="categoryUpdateImage" onchange="document.getElementById('cateImg2').src = window.URL.createObjectURL(this.files[0]);document.getElementById('cateImg2').classList.toggle('d-none')">
                                                                    <div class="image-uploads" wire.ignore>
                                                                        <img src="{{ $categoryUpdateImage }}" class="d-none"
                                                                            style="height: 300px; width:300px;"
                                                                            id="cateImg2" alt="img">
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
                                                <!-- Updateing form End
                                                ================================================== -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <button style="background: none; border:0px" class="me-3"
                                    wire:click="delete({{ $course->id }})">
                                    <img src="assets/img/icons/delete.svg" alt="img">
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        {{-- <td colspan="3">
                            {{ $this->categories->links() }}
                        </td> --}}
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('paginationCss')
    <style rel="stylesheet">
        .pagination {
            color: white !important;
        }

        .page-link {
            color: white !important;
            background: #868484 !important;
        }

        .page-item.active .page-link {
            border: 0px !important;
            color: black !important;
            background: #ff9f43 !important;
            transform: scale(1.2);
            transition: 0.5s
        }
    </style>
@endpush
