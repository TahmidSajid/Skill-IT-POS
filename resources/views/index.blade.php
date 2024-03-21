@extends('layouts.dashboard')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Profile</h4>
            <h6>User Profile</h6>
        </div>
    </div>
    <livewire:pages.dashboard.dashboard-panel />

    <div class="row">
        <div class="col-lg-3">
            <livewire:pages.dashboard.name-change />
        </div>
        <div class="col-lg-4">
            <livewire:pages.dashboard.password-change />
        </div>
    </div>

@endsection
