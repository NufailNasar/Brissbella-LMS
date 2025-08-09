@extends('layouts.app')
@section('content')
<div class="section-title mb-4">
    <h2 class="border-bottom pb-2">Dashboard</h2>
</div>
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card text-white bg-info shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Courses</h5>
                <p class="card-text display-4">{{$c_count}}</p>
            </div>
        </div>
    </div>
        <div class="col-md-4">
        <div class="card text-white bg-warning shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Lectures</h5>
                <p class="card-text display-4">{{ $l_count}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Students</h5>
                <p class="card-text display-4">{{ $s_count}}</p>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-pink text-white">Recently Added Courses</div>
            <ul class="list-group list-group-flush">
                @foreach ( $c_list as $data )
                
                <li class="list-group-item"> {{ $data['name'] }}- {{ $data['created_at_diff'] }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-pink text-white">Recent Notifications</div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Student John added</li>
                <li class="list-group-item">Course updated: Laravel Essentials</li>
                <li class="list-group-item">Lecture scheduled for 25th July</li>
            </ul>
        </div>
    </div>
</div>
@endsection