@extends('layouts.dashboard')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Dashboard</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="dash-widget dash2">
                <div class="dash-widgetimg">
                    <span>
                        <img src="assets/img/icons/dash2.svg" alt="img" />
                    </span>
                </div>
                <div class="dash-widgetcontent">
                    <h5>
                        ৳<span class="counters" data-count="{{ $total_cost }}"></span>
                    </h5>
                    <h6>Total Cost</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="dash-widget dash2">
                <div class="dash-widgetimg">
                    <span>
                        <img src="assets/img/icons/dash2.svg" alt="img" />
                    </span>
                </div>
                <div class="dash-widgetcontent">
                    <h5>
                        ৳<span class="counters" data-count="{{ $total_paid }}"></span>
                    </h5>
                    <h6>Total Money Got</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="dash-widget dash2">
                <div class="dash-widgetimg">
                    <span>
                        <img src="assets/img/icons/dash2.svg" alt="img" />
                    </span>
                </div>
                <div class="dash-widgetcontent">
                    <h5>
                        ৳<span class="counters" data-count="{{ $total_due }}"></span>
                    </h5>
                    <h6>Total Due</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="dash-widget dash2">
                <div class="dash-widgetimg">
                    <span>
                        @if ($total_loss > 0)
                            <img src="assets/img/icons/dash3.svg" alt="img" />
                        @else
                            <img src="assets/img/icons/dash4.svg" alt="img" />
                        @endif
                    </span>
                </div>
                <div class="dash-widgetcontent">
                    @if ($total_loss > 0)
                        <h5>
                            ৳<span class="counters" data-count="{{ $total_loss }}"></span>
                        </h5>
                    @else
                        <h5>
                            ৳<span class="counters" data-count="{{ $total_gain }}"></span>
                        </h5>
                    @endif
                    @if ($total_loss > 0)
                        <h6>Total Money Lost</h6>
                    @else
                        <h6>Total Money Gain</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="dash-count">
                <div class="dash-counts">
                    <h4>{{ $total_student }}</h4>
                    <h5>Total Student</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="user"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="dash-count das1">
                <div class="dash-counts">
                    <h4>{{ $active_student }}</h4>
                    <h5>Total Active Student</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="user-check"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="dash-count das3">
                <div class="dash-counts">
                    <h4>{{ $enrolled_student }}</h4>
                    <h5>Total Enrolled Student</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="user-check"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="dash-count das2">
                <div class="dash-counts">
                    <h4>{{ $launched_course }}</h4>
                    <h5>Total Launched Course</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="file"></i>
                </div>
            </div>
        </div>
    </div>
    <livewire:dashboard.monthly-expense>
@endsection
