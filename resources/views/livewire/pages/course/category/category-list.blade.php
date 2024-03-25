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
                        <th>Category name</th>
                        <th>Category tag</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->categories as $key => $category)
                        <tr>
                            <td>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>
                            <td class="productimgname">
                                <a href="javascript:void(0);" class="product-img">
                                    <img src="{{ asset('uploads/category_photos') }}/{{ $category->category_photo }}"
                                        alt="product">
                                </a>
                                <a href="javascript:void(0);">{{ $category->category_name }}</a>
                            </td>
                            <td>{{ $category->category_tag }}</td>
                            <td>{{ $category->category_description }}</td>
                            <td>
                                <button style="background: none; border:0px" class="me-3 confirm-text"type="button"
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
                                                                <label> Category Image</label>
                                                                <div class="image-upload mb-0"
                                                                    style="padding: 100px 0px">
                                                                    <input type="file" wire:model="categoryImage"
                                                                        onchange="document.getElementById('cateImgThree').src = window.URL.createObjectURL(this.files[0])">
                                                                    <div class="image-uploads">
                                                                        <img src="{{ $categoryImage }}"
                                                                            style="height: 50px; width:50px;"
                                                                            id="cateImgThree" alt="img">
                                                                        <h4>Drag and drop a file to upload</h4>
                                                                        <img src="{{ asset('uploads/category_photos') }}/{{ $imagePreview }}"
                                                                            style="height: 50px; width:50px;"
                                                                            id="cateImg2" alt="img">
                                                                        <h4>previous image</h4>
                                                                    </div>
                                                                </div>
                                                                @error('categoryImage')
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
                                </div>
                                <button style="background: none; border:0px" class="me-3"
                                    wire:click="delete({{ $category->id }})">
                                    <img src="assets/img/icons/delete.svg" alt="img">
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">
                            {{ $this->categories->links() }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('tableJS')
    <script src="{{ asset('assets') }}/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
@endpush
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
