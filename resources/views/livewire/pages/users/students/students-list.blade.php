<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <label class="checkboxs">
                                <input type="checkbox">
                                <span class="checkmarks"></span>
                            </label>
                        </th>
                        <th>User name </th>
                        <th>Phone</th>
                        <th>email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->students as $student)
                        <tr>
                            <td>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->role }}</td>
                            <td>
                                @if ($student->status == 'active')
                                    <span class="bg-lightgreen badges">Active</span>
                                @else
                                    <span class="bg-lightred badges">Deactive</span>
                                @endif
                            </td>
                            <td>
                                @if ($student->payment_status)
                                    <span class="bg-lightgreen badges">Active</span>
                                    <span class="bg-lightred badges">Deactive</span>
                                @else
                                    <span>Not enrolled yet</span>
                                @endif

                            </td>
                            <td>
                                <a class="me-3" href="newuseredit.html">
                                    <img src="assets/img/icons/edit.svg" alt="img">
                                </a>
                                <a class="me-3 confirm-text" href="javascript:void(0);">
                                    <img src="assets/img/icons/delete.svg" alt="img">
                                </a>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
