@extends('layouts.dashboard')
@section('content')
    <div class="page-title">
        <h4>
            Individual Payments
        </h4>
    </div>
    @livewire('pages.payment.individual-payment', ['payments' => $payments, 'student' => $studentInfo, 'course' => $courseInfo])
@endsection
