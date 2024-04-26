@extends('layouts.dashboard')
@section('content')
    <div class="page-header">
        <div class="page-title">
            @if (auth()->user()->role == 'admin')
                <h4>
                    Payment Management
                </h4>
            @else
                <h4>
                    Enrollment List
                </h4>
            @endif
        </div>
    </div>
    <livewire:pages.payment.student-payment-list>
    @endsection
