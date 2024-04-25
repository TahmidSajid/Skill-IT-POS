@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-3">
            <livewire:pages.course.course.add-course/>
        </div>
        <div class="col-lg-9">
            <livewire:pages.course.course.course-list/>
        </div>
    </div>
@endsection
