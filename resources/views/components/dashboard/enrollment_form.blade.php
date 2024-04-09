<div class="row" style="margin-top: 80px">
    <div class="col-lg-3 offset-lg-8">
        <label class="toggle">
            <input class="toggle-checkbox" type="checkbox" wire:model.live="installmentPermit" value="true">
            <div class="toggle-switch"></div>
            <span class="toggle-label">Installment</span>
        </label>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 offset-lg-2 mb-4">
        <label class="form-label">Installment</label>
        <input type="number" class="form-control" @if ($installmentPermit != 'true') disabled @endif
            wire:model.live="installment">
    </div>
    <div class="col-lg-8 offset-lg-2 mb-4">
        <label class="form-label">Discount%</label>
        <input type="number" class="form-control" wire:model.live="discount">
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <hr>
        <h4>Total :</h4>
    </div>
    <div class="col-lg-8 offset-lg-2">
        <div class="total-order" style="margin-right: 0px">
            <ul>
                <li>
                    <h4>Number Of Installment</h4>
                    <h5>
                        @if ($installment)
                            {{ $installment }}
                        @else
                            full payment
                        @endif
                    </h5>
                </li>
                <li>
                    <h4>
                        Price
                    </h4>
                    <h5>
                        @if ($course->discount_price)
                            <span><del>{{ $course->price }}৳</del></span>
                            {{ $course->discount_price }}৳
                        @else
                            {{ $course->price }}৳
                        @endif
                    </h5>
                </li>
                <li>
                    <h4>Discount </h4>
                    <h5>
                        @if ($discount)
                            {{ $discount }}
                        @else
                            0
                        @endif%
                    </h5>
                </li>
                <li>
                    <h4>Amount</h4>
                    <h5>{{ $this->amount }}৳</h5>
                </li>
            </ul>
        </div>
    </div>
</div>
