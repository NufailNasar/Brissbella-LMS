@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <h2 class="mb-4">Course Details</h2> -->
    <form id="courseFormUpdate" enctype="multipart/form-data">
        <div class="modal-body">
            <input type="hidden" class="form-control mb-2" name="course_id" placeholder="Course Name" value="{{ $course->id }}" required>
            <input type="text" class="form-control mb-2" name="name" placeholder="Course Name" value="{{ $course->name }}" required>
            <select class="form-control mb-2" id="courseCategory" name="category" required>
                <option value="">-- Select the Category --</option>
                <option value="Hair Styling" {{ $course->category == 'Hair Styling' ? 'selected' : '' }}>Hair Styling</option>
                <option value="Makeup" {{ $course->category == 'Makeup' ? 'selected' : '' }}>Makeup Artistry</option>
                <option value="Beauty" {{ $course->category == 'Beauty' ? 'selected' : '' }}>Beauty</option>
                <option value="Facial" {{ $course->category == 'Facial' ? 'selected' : '' }}>Facial</option>
                <option value="Bridal" {{ $course->category == 'Bridal' ? 'selected' : '' }}>Bridal</option>
            </select>

            <input type="text" name="durration" class="form-control mb-2" placeholder="Duration" value="{{ $course->durrarion }}" required>
            <textarea id="summernote" name="description">{{$course->description}}</textarea>

            <input type="file" class="form-control" id="courseImage" name="image" accept="image/*" onchange="previewImage(event)">
            <img id="imagePreview" src="#" alt="Image Preview" class="mt-2" style="max-width: 200px; display: none;" />

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-pink">Update</button>
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        </div>
    </form>

    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
</div>
@endsection