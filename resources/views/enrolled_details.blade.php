@extends('layouts.dashboard')
@section('content')
    <div class="page-title">
        <h4>Enrollment Details</h4>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Details</h4>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('uploads/student_photos') }}/{{ $enrollment->getStudent->photo }}"
                            style="height: 150px; width: 150px;" class="avatar-img rounded-circle text-center mx-auto"
                            alt="" srcset="">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        Student Name :
                                    </td>
                                    <td>{{ $enrollment->getStudent->name }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>
                                            <b>Contact Number :</b>
                                        </p>
                                    </td>
                                    <td>{{ $enrollment->getStudent->phone }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        Course Name :
                                    </td>
                                    <td>{{ $enrollment->getCourse->course_name }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        Total payment:
                                    </td>
                                    <td>{{ $enrollment->payment }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            @foreach ($payments as $payment)
                <div class="dash-count @if ($payment->status != 'unpaid') das3 @endif">
                    <div class="dash-counts">
                        <h4>{{ $payment->payment_system }}: {{ $loop->iteration }}</h4>
                        <h5>Status: <span>{{ $payment->status }}</span></h5>
                    </div>
                    <div class="dash-counts">
                        <h5>Amount</h5>
                        <h4>{{ $payment->payment }}৳</h4>
                    </div>
                    @if ($payment->status == 'unpaid')
                        <div class="dash-imgs">
                            <h4>Due</h4>
                        </div>
                    @else
                        <h4>Paid</h4>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
