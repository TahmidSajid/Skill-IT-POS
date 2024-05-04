<div class="card">
    <div class="card-body">
        <div class="">
            <div class="row">
                <div class="col-lg-4 offset-lg-8">
                    <div class="input-group mb-4">
                        <input class="form-control border-end-0 border" type="search" wire:model.live="search" 
                            id="example-search-input" placeholder="search here....">
                        <span class="input-group-append bg-transparent">
                            <button class="btn btn-outline-secondary bg-white border-start-0 border-bottom-0 border ms-n5"
                                type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Category name</th>
                        <th>Category tag</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->categories as $key => $category)
                        <tr>
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
                                                @include('components.dashboard.category-edit')
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
                                @if (!App\Models\Courses::where('category_id', $category->id)->exists() && !App\Models\Subcategory::where('subcategory_id', $category->id)->exists())
                                    <button style="background: none; border:0px" class="me-3"
                                        wire:click="delete({{ $category->id }})">
                                        <img src="assets/img/icons/delete.svg" alt="img">
                                    </button>
                                    @else
                                    <p class="text-warning">In use</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5">
                            {{ $this->categories->links() }}
                        </td>
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
