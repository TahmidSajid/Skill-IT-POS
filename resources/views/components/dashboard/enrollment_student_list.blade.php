<div class="row mb-4">
    <div class="col-lg-4 offset-lg-8">
        <div class="input-group">
            <input class="form-control border-end-0 border" type="search" wire:model.live="studentSearch" value="search"
                id="example-search-input" placeholder="search here....">
            <span class="input-group-append bg-transparent">
                <button class="btn btn-outline-secondary bg-white border-start-0 border-bottom-0 border ms-n5"
                    type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </div>
</div>
<table class="table table-bordered mb-0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <form wire:submit="enroll">
            @forelse ($this->students as $student)
                <tr>
                    <td class="d-flex align-items-center">
                        <input class="form-check-input mx-2"
                            wire:model.live="candidates" type="checkbox"
                            value="{{ $student->id }}">
                        <a class="product-img" class="mx-2">
                            <img src="{{ asset('uploads/student_photos') }}/{{ $student->photo }}"
                                alt="">
                        </a>
                        <a href=""
                            class="mx-2">{{ $student->name }}</a>
                    </td>
                    <td>
                        {{ $student->phone }}
                    </td>
                    <td>
                        {{ $student->status }}
                    </td>
                </tr>
            @empty
            @endforelse
            <tr>
                <td colspan="3">
                    {{ $this->students->links() }}
                </td>
            </tr>
    </tbody>
</table>
