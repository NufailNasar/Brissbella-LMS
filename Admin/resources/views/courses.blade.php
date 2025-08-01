@extends('layouts.app')
@section('content')
<h2 class="mb-4">Courses</h2>
<button class="btn btn-pink mb-3 float-right" data-toggle="modal" data-target="#addCourseModal">+ Add Course</button>
<table class="table table-hover table-bordered">
  <thead class="thead-dark">
    <tr>
      <th>Name</th>
      <th>Category</th>
      <th>Duration</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ( $courceData as $data )
    <tr>
      <th>{{ $data->name }}</th>
      <th>{{ $data->category }}</th>
      <th>{{ $data->durrarion }}</th>
      <td>
        <a href="{{ route('courses.view', $data->id) }}" class="btn btn-info btn-sm">View</a>
        <a href="{{ route('courses.update', $data->id) }}" class="btn btn-success btn-sm">Update</a>
        <button type="button" class="btn btn-danger btn-sm delete-btn-c" data-id="{{ $data->id }}"> Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="pagination-wrapper">
  {{ $courceData->links() }}
</div>

<!-- Modal -->
<div class="modal fade" id="addCourseModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-pink text-white">
        <h5 class="modal-title">Add Course</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="courseForm" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="text" class="form-control mb-2" name="name" placeholder="Course Name" required>
          <select class="form-control mb-2" id="courseCategory" name="category" required>
            <option value="">-- Select the Category --</option>
            <option value="Hair Styling">Hair Styling</option>
            <option value="Makeup">Makeup Artisty</option>
            <option value="Beauty">Beauty</option>
            <option value="Facial">Facial</option>
            <option value="Bridal">Bridal</option>
          </select>

          <input type="text" name="durration" class="form-control mb-2" placeholder="Duration" required>
          <textarea id="summernote" name="description">{!! old('description', '<p>desciption</p>') !!}</textarea>

          <input type="file" class="form-control" id="courseImage" name="image" accept="image/*" onchange="previewImage(event)">
          <img id="imagePreview" src="#" alt="Image Preview" class="mt-2" style="max-width: 200px; display: none;" />

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-pink">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection