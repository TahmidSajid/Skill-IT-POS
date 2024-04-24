@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <livewire:pages.users.moderator.add-moderator>
        </div>
        <div class="col-lg-8">
            <livewire:pages.users.moderator.moderators-list>
        </div>
    </div>
@endsection
