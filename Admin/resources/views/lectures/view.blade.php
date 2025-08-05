@extends('layouts.app') {{-- or your base layout --}}

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Lecture Details</h4>
        </div>
        <div class="card-body">
            <p><strong>First Name:</strong> {{ $lecture->f_name }}</p>
            <p><strong>Last Name:</strong> {{ $lecture->l_name }}</p>
            <p><strong>Mobile:</strong> {{ $lecture->mobile }}</p>
            <p><strong>Email:</strong> {{ $lecture->email }}</p>
            <p><strong>Qualification:</strong> {!! $lecture->qualification !!}</p> {{-- Allow rich HTML if needed --}}
            <p><strong>Course:</strong> {{ \App\Models\Cources::find($lecture->cid)->name ?? 'N/A' }}</p>
            <p><strong>Address:</strong> {{ $lecture->Address }}</p>
            <p><strong>Date of Birth:</strong> {{ $lecture->dob }}</p>
            <p><strong>NIC:</strong> {{ $lecture->nic }}</p>
        </div>
    </div>
</div>
@endsection
