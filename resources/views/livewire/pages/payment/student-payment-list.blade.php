<div>
    <div class="row">
        <div class="col-lg-4 offset-lg-8">
            <div class="input-group">
                <input class="form-control border-end-0 border" type="search" wire:model.live="search" value="search"
                    id="example-search-input" placeholder="search here....">
                <span class="input-group-append bg-transparent">
                    <button class="btn btn-outline-secondary bg-white border-start-0 border-bottom-0 border ms-n5"
                        type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Student name</th>
                                    <th>Phone</th>
                                    <th>email</th>
                                    <th>Payment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->students as $key => $student)
                                    <tr>
                                        <td class="d-flex align-items-center">
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>

                                            <div class="productimgname" wire:ignore>
                                                <a href="{{ asset('uploads/student_photos') }}/{{ $student->getStudent->photo }}"
                                                    class="product-img image-popup">
                                                    <img class="img-fluid"
                                                        src="{{ asset('uploads/student_photos') }}/{{ $student->getStudent->photo }}"
                                                        alt="product">
                                                </a>
                                                {{ $student->getStudent->name }}
                                            </div>
                                        </td>
                                        <td>{{ $student->getStudent->phone }}</td>
                                        <td>{{ $student->getStudent->email }}</td>
                                        <td>
                                            @if ($student->payment == 'due')
                                                <span class="bg-lightyellow badges">{{ $student->payment }}</span>
                                            @else
                                                <span class="bg-lightgreen badges">{{ $student->payment }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="me-3 confirm-text btn btn-sm btn-info text-white"
                                                href="{{ route('individual_payment',[$student->course_id,$student->getStudent]) }}">
                                                Payment Management
                                            </a>
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
        </div>
    </div>
</div>
