<div>
    <div class="row">
        <hr>
        <div class="col-lg-6">
            <h3>Monthly Calculation</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 offset-lg-5 my-4">
            <select class="form-select" wire:model.live="date" aria-label="Default select example">
                <option selected value="">Open this select menu</option>
                @forelse ($this->dates as $date)
                    <option value="{{ $date->date }}">{{ $date->date }}</option>
                @empty
                @endforelse
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Monthly Expenses</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course Name</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->expenses as $expense)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $expense->getCourse->course_name }}</td>
                                        <td>{{ $expense->expense }}</td>
                                        <td>{{ $expense->date }}</td>

                                    </tr>
                                @empty
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="dash-widget dash2">
                <div class="dash-widgetimg">
                    <span>
                        <img src="assets/img/icons/dash2.svg" alt="img" />
                    </span>
                </div>
                <div class="dash-widgetcontent">
                    @if ($this->totalExpense != 0)
                        <h5>
                            ৳<span>{{ $this->totalExpense }}</span>
                        </h5>
                    @else
                        <h5>
                            <span>No expense in this month</span>
                        </h5>
                    @endif
                    <h6>Monthly Expense</h6>
                </div>
            </div>
            <div class="dash-widget dash2">
                <div class="dash-widgetimg">
                    <span>
                        <img src="assets/img/icons/dash2.svg" alt="img" />
                    </span>
                </div>
                <div class="dash-widgetcontent">
                    @if ($this->totalPayments != 0)
                        <h5>
                            ৳<span>{{ $this->totalPayments }}</span>
                        </h5>
                    @else
                        <h5>
                            <span>No payments got in this month</span>
                        </h5>
                    @endif
                    <h6>Monthly Gain</h6>
                </div>
            </div>
            <div class="dash-widget dash2">
                <div class="dash-widgetimg">
                    <span>
                        @if ($this->totalExpense < $this->totalPayments)
                            <img src="assets/img/icons/dash4.svg" alt="img" />
                        @else
                            <img src="assets/img/icons/dash3.svg" alt="img" />
                        @endif
                    </span>
                </div>
                <div class="dash-widgetcontent">
                    @if ($this->totalExpense < $this->totalPayments)
                    <h5>
                        ৳<span>{{ $this->totalPayments - $this->totalExpense }}</span>
                    </h5>
                    <h6>Monthly Gain</h6>
                    @else
                    <h5>
                        ৳<span>{{ $this->totalExpense - $this->totalPayments}}</span>
                    </h5>
                    <h6>Monthly Loss</h6>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Monthly Gain</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course Name</th>
                                    <th>Student Name</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->payments as $payment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $payment->getCourse->course_name }}</td>
                                        <td>{{ $payment->getStudent->name }}</td>
                                        <td>{{ $payment->payment }}</td>
                                        <td>{{ $payment->date }}</td>
                                    </tr>
                                @empty
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
