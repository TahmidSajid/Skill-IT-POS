<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Course Name</th>
                        <th>Expense</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->expenses as $key => $expense)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $expense->getCourse->course_name }}
                            </td>
                            <td>{{ $expense->expense }}৳</td>
                            <td>{{ $expense->date }}</td>
                            <td>
                                <button class="me-3 bg-transparent border-0" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $key }}"
                                    wire:click="edit({{ $expense->id }})">
                                    <img src="assets/img/icons/edit.svg" alt="img">
                                </button>
                                <!-- Modal -->
                                <!-- expense edit form start
                                ================================================== -->
                                @include('components.dashboard.expense-edit')
                                <!-- expense edit form end
                                ================================================== -->

                                <button type="button" class="bg-transparent border-0"
                                    wire:click="delete({{ $expense->id }})">
                                    <img src="{{ asset('assets') }}/img/icons/delete.svg" alt="img">
                                </button>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    <tr>
                        <td colspan="6">
                            {{-- {{ $this->students->links() }} --}}
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
