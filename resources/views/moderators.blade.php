@extends('layouts.dashboard')
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h4>Moderators</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <livewire:pages.users.moderator.add-moderator>
        </div>
        <div class="col-lg-8">
            <livewire:pages.users.moderator.moderators-list>
        </div>
    </div>
@endsection
