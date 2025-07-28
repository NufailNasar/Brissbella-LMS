@extends('layouts.app')
@section('content')
<h2 class="mb-4">Students</h2>
<button class="btn btn-pink mb-3 float-right" data-toggle="modal" data-target="#addStudentModal">+ Add Student</button>
<table class="table table-hover table-bordered">
  <thead class="thead-dark">
    <tr>
      <th>Name</th>
      <th>course</th>
      <th>batch</th>
      <th>Contacct</th>
      <th>email</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ( $courceData as $data )
    <tr>
      <th>{{ $data->f_name }} {{ $data->l_name }}</th>
      <th>{{ $data->c_name }}</th>
      <th>{{ $data->b_name }}</th>
      <th>{{ $data->mobile }}</th>
      <th>{{ $data->email }}</th>
      <td>
        <!-- View Button -->
        <a href="" class="btn btn-info btn-sm">View</a>

        <!-- Delete Form -->
        <form action="" method="POST" style="display:inline-block;">
          @csrf
          <!-- @method('DELETE') -->
          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this lecture?')">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="pagination-wrapper">
    {{ $courceData->links() }}
</div>

<!-- Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-pink text-white">
        <h5 class="modal-title">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="studentForm" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="text" class="form-control mb-2" name="f_name" placeholder="First Name" required>
          <input type="text" class="form-control mb-2" name="l_name" placeholder="Last Name">
          <input type="text" class="form-control mb-2" name="identification" placeholder="NIC">
          <select class="form-control mb-2" id="courseCategory" name="category" required>
            <option value="">-- Select the Course --</option>
            @foreach ($courseList as $course)
            <option value="{{ $course['id'] }}">{{ $course['name'] }}</option>
            @endforeach
          </select>
          <select class="form-control mb-2" id="batch" name="batch" required>
            <option value="">-- Select the Batch --</option>
            @foreach ($batchList as $batch)
            <option value="{{ $batch['id'] }}">{{ $batch['name'] }}</option>
            @endforeach
          </select>

          <input type="text" name="mobile" class="form-control mb-2" placeholder="Contact Number" required>
          <input type="email" name="email" class="form-control mb-2" placeholder="email" required>
          <!-- <textarea class="form-control mb-2" rows="5" name="description" placeholder="Qualifications"></textarea> -->
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