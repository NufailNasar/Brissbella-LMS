@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <h2 class="mb-4">Course Details</h2> -->

    <div class="card mb-4">
        <div class="card-header bg-pink text-white">
            <h4>{{ $course->name }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Category:</strong> {{ $course->category }}</p>
            <p><strong>Duration:</strong> {{ $course->durrarion }}</p>
            <p><strong>Current Students:</strong> {{ $studentCount }}</p>
            <p><strong>Description:</strong></p>
            <p>{!! $course->description !!}</p>
            
            @if ($course->image)
                <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" style="max-width: 300px;">
            @endif
        </div>
    </div>

    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
</div>
@endsection
