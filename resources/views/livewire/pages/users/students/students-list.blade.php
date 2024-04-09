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
                    @forelse ($this->students as $key => $student)
                        <tr>
                            <td>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>
                            <td class="productimgname" wire:ignore>
                                <a href="{{ asset('uploads/student_photos') }}/{{ $student->photo }}" class="product-img image-popup">
                                    <img class="img-fluid"
                                        src="{{ asset('uploads/student_photos') }}/{{ $student->photo }}"
                                        alt="product">
                                </a>
                                {{ $student->name }}
                            </td>
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
                                <button class="me-3 bg-transparent border-0" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $key }}"
                                    wire:click="edit({{ $student->id }})">
                                    <img src="assets/img/icons/edit.svg" alt="img">
                                </button>
                                <!-- Modal -->
                                <!-- student edit form start
                                ================================================== -->
                                @include('components.dashboard.student-edit')
                                <!-- student edit form end
                                ================================================== -->
                                <button type="button" class="me-3 confirm-text bg-transparent border-0"
                                    wire:click="delete({{ $student->id }})">
                                    <img src="{{ asset('assets') }}/img/icons/delete.svg" alt="img">
                                </button>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    <tr>
                        <td colspan="5">
                            {{-- {{ $this->categories->links() }} --}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('pluginCss')
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/lightbox/glightbox.min.css">
@endpush
@push('pluginJs')
    <script src="{{ asset('assets') }}/plugins/lightbox/glightbox.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/plugins/lightbox/lightbox.js" type="text/javascript"></script>
@endpush
