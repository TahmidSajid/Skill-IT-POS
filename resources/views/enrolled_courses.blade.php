@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-8">

            <div class="row">
                @forelse ($enrollments as $enrollment)
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0 text-center">
                            <div class="card-body">
                                <p class="mb-4">
                                    <span class="text-primary font-italic me-1">Course :</span>
                                    {{ $enrollment->getCourse->course_name }}
                                </p>
                                <p class="mb-4">
                                    <span class="text-primary font-italic me-1">Payment Status</span>
                                    {{ $enrollment->payment }}
                                </p>
                                <p class="mb-4">
                                    <span class="text-primary font-italic me-1">Enrollerd at : </span>
                                    {{ $enrollment->created_at }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection
