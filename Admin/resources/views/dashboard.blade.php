@extends('layouts.app')
@section('content')
<h2>Dashboard</h2>
<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <h5 class="card-title">Courses</h5>
                <p class="card-text">20</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Students</h5>
                <p class="card-text">80</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Lectures</h5>
                <p class="card-text">12</p>
            </div>
        </div>
    </div>
</div>
@endsection