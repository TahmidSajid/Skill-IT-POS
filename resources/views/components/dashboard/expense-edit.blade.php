<div class="modal fade" id="exampleModal{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" wire:ignore>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Expense Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit="update({{ $expense->id }})">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Course Name</label>
                            <select class="form-select" aria-label="Default select example" wire:model='courseId'>
                                <option selected>Open this select menu</option>
                                @foreach ($this->courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                @endforeach
                            </select>
                            @error('courseId')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Expense</label>
                            <input type="number" class="form-control" placeholder="Enter expense" wire:model='expense'>
                            @error('expense')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Date</label>
                            <input type="month" id="month" class="form-control" wire:model='date'>
                            @error('month')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-submit me-2" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
