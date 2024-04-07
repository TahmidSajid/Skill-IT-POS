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
        <input type="number" class="form-control" @if ($installmentPermit != 'true') disabled @endif wire:model.live="installment">
    </div>
    <div class="col-lg-8 offset-lg-2 mb-4">
        <label class="form-label">Discount%</label>
        <input type="number" class="form-control" wire:model="discount">
    </div>
</div>

