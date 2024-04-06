<div>
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="input-group">
                <input class="form-control border-end-0 border" type="search" wire:model.live="search" value="search"
                    id="example-search-input">
                <span class="input-group-append">
                    <button class="btn btn-outline-secondary bg-white border-start-0 border-bottom-0 border ms-n5"
                        type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
    </div>
    <div class="row py-4">
        @foreach ($this->courses as $key => $course)
            <div class="col-lg-4">
                <div class="card flex-fill bg-white">
                    <img alt="Card Image" src="{{ asset('uploads/course_photos') }}/{{ $course->course_image }}"
                        class="card-img-top">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ $course->course_name }}</h5>
                        <p>{{ $course->getCategory->category_tag }}</p>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $course->description }}</p>
                        <div class="row">
                            <div class="col-lg-4">
                                <span>Cost:</span>
                                <span style="font-size: 25px">{{ $course->cost }}৳</span>
                            </div>
                            <div class="col-lg-4 @if (!$course->discount_price) offset-lg-4 @endif">
                                <span>Price:</span>
                                <span style="font-size: 25px">{{ $course->price }}৳</span>
                            </div>
                            @if ($course->discount_price)
                                <div class="col-lg-4">
                                    <span>Discount Price:</span>
                                    <span style="font-size: 25px">{{ $course->discount_price }}৳</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-submit" data-bs-toggle="modal"
                            data-bs-target="#exampleModal{{ $key }}">Enroll</button>
                    </div>
                    <div class="modal fade" id="exampleModal{{ $key }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row mb-4">
                                                <div class="col-lg-4 offset-lg-8">
                                                    <div class="input-group">
                                                        <input class="form-control border-end-0 border" type="search" wire:model.live="studentSearch" value="search"
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
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <form wire:submit="enroll">
                                                        @forelse ($this->students as $student)
                                                            <tr>
                                                                <td class="d-flex align-items-center">
                                                                    <input class="form-check-input mx-2"
                                                                        wire:model.live="candidates" type="checkbox"
                                                                        value="{{ $student->id }}">
                                                                    <a class="product-img" class="mx-2">
                                                                        <img src="{{ asset('uploads/student_photos') }}/{{ $student->photo }}"
                                                                            alt="">
                                                                    </a>
                                                                    <a href=""
                                                                        class="mx-2">{{ $student->name }}</a>
                                                                </td>
                                                                <td>
                                                                    {{ $student->phone }}
                                                                </td>
                                                                <td>
                                                                    {{ $student->status }}
                                                                </td>
                                                            </tr>
                                                        @empty
                                                        @endforelse


                                                </tbody>
                                            </table>
                                            <button class="btn btn-submit" type="submit">Add</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@push('pluginCss')
    <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('pluginJs')
    <script src="vendor/select2/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endpush
