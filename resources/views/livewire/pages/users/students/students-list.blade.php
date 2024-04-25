<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>User name </th>
                        <th>Phone</th>
                        <th>email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->students as $key => $student)
                        <tr>
                            <td class="productimgname">
                                @if ($student->photo)
                                    <a href="{{ asset('uploads/student_photos') }}/{{ $student->photo }}"
                                        class="product-img image-popup">
                                        <img class="img-fluid"
                                            src="{{ asset('uploads/student_photos') }}/{{ $student->photo }}"
                                            alt="product">
                                    </a>
                                @else
                                    <a href="{{ asset('default_photos/default_profile.png') }}"
                                        class="product-img image-popup">
                                        <img class="img-fluid" src="{{ asset('default_photos/default_profile.png') }}"
                                            alt="product">
                                    </a>
                                @endif
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
                                @if (auth()->user()->role == 'admin')
                                    @if (!App\models\Enrollments::where('user_id', $student->id)->exists())
                                        <button type="button" class="me-3 confirm-text bg-transparent border-0"
                                            wire:click="delete({{ $student->id }})">
                                            <img src="{{ asset('assets') }}/img/icons/delete.svg" alt="img">
                                        </button>
                                    @else
                                    <p class="text-warning">In use</p>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    <tr>
                        <td colspan="6">
                            {{ $this->students->links() }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('paginationCss')
    <style rel="stylesheet">
        .pagination {
            color: white !important;
        }

        .page-link {
            color: white !important;
            background: #868484 !important;
        }

        .page-item.active .page-link {
            border: 0px !important;
            color: black !important;
            background: #ff9f43 !important;
            transform: scale(1.2);
            transition: 0.5s
        }
    </style>
@endpush
@push('pluginCss')
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/lightbox/glightbox.min.css">
@endpush
@push('pluginJs')
    <script src="{{ asset('assets') }}/plugins/lightbox/glightbox.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/plugins/lightbox/lightbox.js" type="text/javascript"></script>
@endpush
