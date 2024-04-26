@extends('layouts.dashboard')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Category</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <livewire:pages.course.category.add-category />
        </div>
        <div class="col-lg-8">
            <livewire:pages.course.category.category-list />
        </div>
    </div>
@endsection
