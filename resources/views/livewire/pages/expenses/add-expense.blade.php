<div class="card">
    <div class="card-body">
        <div class="row">
            <form wire:submit="addExpenses" class="bd-example">
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="form-group">
                        <label>Course Name</label>
                        <select class="form-select" aria-label="Default select example" wire:model='courseId'>
                            <option selected value="">Open this select menu</option>
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
                    <button class="btn btn-submit me-2" type="submit" wire:loading.remove wire:target='addExpenses'>Submit</button>
                    <button class="btn btn-primary mb-1" type="button" disabled="" wire:loading
                        wire:target='addExpenses'>
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        <span class="sr-only">Loading...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
