<div>
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="input-group">
                <input class="form-control border-end-0 border" type="search" wire:model.live="search" value="search"
                    id="example-search-input">
                <span class="input-group-append">
                    <button class="btn btn-outline-secondary bg-white border-start-0 border-bottom-0 border ms-n5"
                        type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
    </div>
    <div class="row py-4">
        @foreach ($this->courses as $course)
            <div class="col-lg-4">
                <div class="card flex-fill bg-white">
                    <img alt="Card Image" src="{{ asset('assets') }}/img/img-01.jpg" class="card-img-top">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Card with image and button</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a class="btn btn-primary" href="javascript:void(0);">Go somewhere</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
