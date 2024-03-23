@extends('layouts.dashboard')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Profile</h4>
            <h6>User Profile</h6>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <livewire:pages.dashboard.dashboard-panel />
            <div class="row mb-4">
                <div class="col-lg-3 offset-lg-9 text-end">
                    <button class="btn btn-warning" id="btn_edit" style="font-size: 15px"></i>Edit</button>
                </div>
            </div>
            <div class="row edit_sec d-none">
                <div class="col-lg-4">
                    <livewire:pages.dashboard.name-change />
                </div>
                <div class="col-lg-5">
                    <livewire:pages.dashboard.password-change />
                </div>
                <div class="col-lg-3">
                    <livewire:pages.dashboard.email-change />
                </div>
            </div>
        </div>
    </div>
@endsection
@push('customeJS')
    <script>
        let btn_edit = document.querySelector('#btn_edit');
        let edit_sec = document.querySelector('.edit_sec');
        btn_edit.addEventListener('click',()=>{
            edit_sec.classList.toggle('d-none')
        })
        console.log(btn_edit);
    </script>
@endpush
{{-- @push('customeCSS')
    <style>
        .d-none{
            transition: 0.5s !important;
        }
    </style>
@endpush --}}
