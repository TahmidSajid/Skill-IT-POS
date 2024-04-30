<div>
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
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
                    <h4 class="card-title">Basic Table</h4>
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
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic Table</h4>
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
