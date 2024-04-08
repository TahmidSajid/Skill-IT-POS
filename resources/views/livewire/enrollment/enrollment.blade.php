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
                            data-bs-target="#exampleModal{{ $key }}" wire:click="enrollStart({{ $course }})">Enroll</button>
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
                                    <form wire:submit="enroll">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            @include('components.dashboard.enrollment_student_list')
                                            @php
                                                print_r($candidates);
                                            @endphp
                                        </div>
                                        <div class="col-lg-6">
                                            @include('components.dashboard.enrollment_form')
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Enroll</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $this->payment }}
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

@push('pluginCss')
    <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, ".SFNSText-Regular", "Helvetica Neue", "Roboto", "Segoe UI", sans-serif;
        }

        .toggle {
            cursor: pointer;
            display: inline-block;
        }

        .toggle-switch {
            display: inline-block;
            background: #ccc;
            border-radius: 16px;
            width: 58px;
            height: 32px;
            position: relative;
            vertical-align: middle;
            transition: background 0.25s;
        }

        .toggle-switch:before,
        .toggle-switch:after {
            content: "";
        }

        .toggle-switch:before {
            display: block;
            background: linear-gradient(to bottom, #fff 0%, #eee 100%);
            border-radius: 50%;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.25);
            width: 24px;
            height: 24px;
            position: absolute;
            top: 4px;
            left: 4px;
            transition: left 0.25s;
        }

        .toggle:hover .toggle-switch:before {
            background: linear-gradient(to bottom, #fff 0%, #fff 100%);
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.5);
        }

        .toggle-checkbox:checked+.toggle-switch {
            background: #56c080;
        }

        .toggle-checkbox:checked+.toggle-switch:before {
            left: 30px;
        }

        .toggle-checkbox {
            position: absolute;
            visibility: hidden;
        }

        .toggle-label {
            margin-left: 5px;
            position: relative;
            top: 2px;
        }
    </style>
@endpush

@push('pluginJs')
    <script src="vendor/select2/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endpush
