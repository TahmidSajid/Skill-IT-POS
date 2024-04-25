<div class="card">
    <div class="card-body">
        <div class="">
            <table class="table text-center">
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
                        <th>Sub-Category</th>
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
                            <td>{{ $course->getCategory->category_tag }}</td>
                            @php
                                $subCate = App\Models\Subcategory::where('course_id', $course->id)->get();
                            @endphp
                            <td>
                                @foreach ($subCate as $x)
                                    {{ $x->getCategoryName->category_tag }} <br>
                                @endforeach
                            </td>
                            <td>{{ Str::limit($course->description, 10, '...') }}</td>
                            <td>{{ $course->cost }}</td>
                            <td>{{ $course->price }}</td>
                            <td>{{ $course->discount_price }}</td>
                            <td>
                                @if ($course->status == 'open')
                                    <span class="badges bg-lightgreen">{{ $course->status }}</span>
                                @else
                                    <span class="badges bg-lightred">{{ $course->status }}</span>
                                @endif
                            </td>
                            <td>
                                <button style="background: none; border:0px" class="me-3 confirm-text"type="button"
                                    class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $key }}"
                                    wire:click="edit({{ $course->id }})">
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
                                                <!-- Updating form Start
                                                ================================================== -->
                                                <div class="row">
                                                    @include('components.dashboard.course-edit')
                                                </div>
                                                <!-- Updating form End
                                                ================================================== -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if (!App\Models\Enrollments::where('course_id', $course->id)->exists())
                                    <button style="background: none; border:0px" class="me-3"
                                        wire:click="delete({{ $course->id }})">
                                        <img src="assets/img/icons/delete.svg" alt="img">
                                    </button>
                                @else
                                <p class="text-warning">In use</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="10" class="text-center">
                            {{ $this->courses->links() }}
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
