@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <livewire:pages.expenses.add-expense>
        </div>
        <div class="col-lg-8">
            <livewire:pages.expenses.expense-list>
        </div>
    </div>
@endsection
