@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <div class="page-title">
                    <h4>User Management</h4>
                    <h6>Student</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <livewire:pages.users.students.add-students/>
        </div>
        <div class="col-lg-8">
            <livewire:pages.users.students.students-list/>
        </div>
    </div>
@endsection
