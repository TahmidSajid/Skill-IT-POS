@extends('layouts.dashboard')
@section('content')
    @livewire('pages.payment.individual-payment',['payments'=> $payments,'student' => $studentInfo,'course' => $courseInfo])
@endsection

