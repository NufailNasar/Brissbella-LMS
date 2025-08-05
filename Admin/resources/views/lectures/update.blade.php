@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <h2 class="mb-4">Course Details</h2> -->
    <form id="lectureFormUpdate" enctype="multipart/form-data">
        <div class="modal-body">
          <input value="{{ $lecture->id }}" type="hidden" class="form-control mb-2" name="l_id" placeholder="Lecture First Name" required>
          <input value="{{ $lecture->f_name }}" type="text" class="form-control mb-2" name="f_name" placeholder="Lecture First Name" required>
          <input value="{{ $lecture->l_name }}" type="text" class="form-control mb-2" name="l_name" placeholder="Lecture Last Name">
          <select class="form-control mb-2" id="courseCategory" name="category" required>
            <option value="">-- Select the Course --</option>
            @foreach ($courseList as $course)
                <option value="{{ $course['id'] }}" {{ $lecture->cid == $course['id'] ? 'selected' : '' }}>
                    {{ $course['name'] }}
                </option>
            @endforeach
          </select>

          <input value="{{ $lecture->mobile }}" type="text" name="mobile" class="form-control mb-2" placeholder="Contact Number" required>
          <input value="{{ $lecture->email }}" type="email" name="email" class="form-control mb-2" placeholder="Email" required>
          <input value="{{ $lecture->Address }}" type="test" name="addreess" class="form-control mb-2" placeholder="Addreess" required>
          <input value="{{ $lecture->nic }}" type="test" name="nic" class="form-control mb-2" placeholder="NIC" required>
          <input value="{{ $lecture->dob }}" type="test" name="dob" class="form-control mb-2" placeholder="DOB 07/13/1990" required>
        <textarea class="form-control mb-2" id="summernote" rows="5" name="description" placeholder="Qualifications">{{ old('description', $lecture->qualification) }}</textarea>
          <input type="file" class="form-control" id="courseImage" name="image" accept="image/*" onchange="previewImage(event)">
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