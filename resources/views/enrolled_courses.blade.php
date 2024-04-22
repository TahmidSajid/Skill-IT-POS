@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <h3 class="my-4">Enrolled Courses</h3>
            <div class="row">
                @forelse ($enrollments as $enrollment)
                    <div class="col-md-6">
                        <a href="{{ route('enrolled_details',$enrollment->id) }}">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p class="mb-4">
                                                <span class="text-primary font-italic me-1">Course :</span>
                                                {{ $enrollment->getCourse->course_name }}
                                            </p>
                                            <p class="mb-4">
                                                <span class="text-primary font-italic me-1">Payment Status</span>
                                                {{ $enrollment->payment }}
                                            </p>
                                            <p class="mb-4">
                                                <span class="text-primary font-italic me-1">Enrollerd at : </span>
                                                {{ $enrollment->created_at }}
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="{{ asset('uploads/course_photos') }}/{{ $enrollment->getCourse->course_image }}"
                                                class="avatar-img rounded-lg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
        <div class="col-lg-4">
            <h3 class="my-4">Enrollment Details</h3>
            <div class="dash-widget">
                <div class="dash-widgetcontent">
                    <h5>
                        {{ $total_enrollment }}
                    </h5>
                    <h6>Total Enrolled Courses</h6>
                </div>
            </div>
            <div class="dash-widget">
                <div class="">
                    <span class="donut"
                        data-peity="{ &quot;fill&quot;: [&quot;#7638ff&quot;, &quot;rgba(67, 87, 133, .09)&quot;]}">{{ $complete_payments }}/{{ $total_payments }}</span>
                </div>
                <div class="dash-widgetcontent">
                    <h5>
                        ৳<span class="counters" data-count="{{ $total_money }}">{{ $total_money }}</span>
                    </h5>
                    <h6>Total money paid</h6>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('pluginCss')

@endpush

@push('pluginJs')
<script src="{{ asset('assets') }}/plugins/peity/jquery.peity.min.js" type="text/javascript"></script>
<script src="{{ asset('assets') }}/plugins/peity/chart-data.js" type="text/javascript"></script>
@endpush
