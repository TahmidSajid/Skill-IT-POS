<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Details</h4>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        @if ($student->photo)
                            <img src="{{ asset('uploads/student_photos') }}/{{ $student->photo }}"
                                style="height: 150px; width: 150px;" class="avatar-img rounded-circle text-center mx-auto"
                                alt="" srcset="">
                        @else
                            <img src="{{ asset('default_photos/default_profile.png') }}"
                                style="height: 150px; width: 150px;"
                                class="avatar-img rounded-circle text-center mx-auto" alt="" srcset="">
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        Student Name :
                                    </td>
                                    <td>{{ $student->name }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>
                                            <b>Contact Number :</b>
                                        </p>
                                    </td>
                                    <td>{{ $student->phone }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        Course Name :
                                    </td>
                                    <td>{{ $course->course_name }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        Total payment:
                                    </td>
                                    <td>{{ $enrollments->payment }}</td>
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
                            <button class="btn btn-success" wire:click="pay({{ $payment->id }})">Pay</button>
                        </div>
                    @else
                        <h4>Paid</h4>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
