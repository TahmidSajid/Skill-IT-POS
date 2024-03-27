@extends('layouts.dashboard')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Product Add</h4>
            <h6>Create new product</h6>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <livewire:pages.course.course.add-course/>
        </div>
        <div class="col-lg-9">
            <livewire:pages.course.course.course-list/>
        </div>
    </div>
@endsection
