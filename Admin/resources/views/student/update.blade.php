@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <h2 class="mb-4">Course Details</h2> -->
    <form id="studentFormUpdate" enctype="multipart/form-data">
        <div class="modal-body">

          <input  value="{{ $student->id }}" type="hidden" class="form-control mb-2" name="s_id" placeholder="First Name" required>
          <input  value="{{ $student->f_name }}" type="text" class="form-control mb-2" name="f_name" placeholder="First Name" required>
          <input  value="{{ $student->l_name }}" type="text" class="form-control mb-2" name="l_name" placeholder="Last Name">
          <input  value="{{ $student->nic }}" type="text" class="form-control mb-2" name="identification" placeholder="NIC">
          <select class="form-control mb-2" id="courseCategory" name="category" required>
            <option value="">-- Select the Course --</option>
            @foreach ($courseList as $course)
            <option value="{{ $course['id'] }}" {{ $student->cid == $course['id'] ? 'selected' : '' }} >{{ $course['name'] }}</option>
            @endforeach
          </select>
          <select class="form-control mb-2" id="batch" name="batch" required>
            <option value="">-- Select the Batch --</option>
            @foreach ($batchList as $batch)
            <option value="{{ $batch['id'] }}" {{ $student->bid == $batch['id'] ? 'selected' : '' }}>{{ $batch['name'] }}</option>
            @endforeach
          </select>

          <input  value="{{ $student->mobile }}" type="text" name="mobile" class="form-control mb-2" placeholder="Contact Number" required>
          <input  value="{{ $student->email }}" type="email" name="email" class="form-control mb-2" placeholder="email" required>
          <!-- <textarea class="form-control mb-2" rows="5" name="description" placeholder="Qualifications"></textarea> -->
          <!-- <input  value="" type="file" class="form-control" id="courseImage" name="image" accept="image/*" onchange="previewImage(event)"> -->
          <img id="imagePreview" src="#" alt="Image Preview" class="mt-2" style="max-width: 200px; display: none;" />

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-pink">Update</button>
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        </div>
    </form>

    <!-- <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a> -->
</div>
@endsection