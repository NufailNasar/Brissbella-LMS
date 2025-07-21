@extends('layouts.app')
@section('content')
<h2>Courses</h2>
<button class="btn btn-pink mb-3" data-toggle="modal" data-target="#addCourseModal">+ Add Course</button>
<table class="table table-bordered">
    <thead>
        <tr><th>Name</th><th>Category</th><th>Duration</th></tr>
    </thead>
    <tbody>
        <tr><td>Web Dev</td><td>IT</td><td>6 months</td></tr>
        <tr><td>Digital Mktg</td><td>Business</td><td>3 months</td></tr>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="addCourseModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-pink text-white">
        <h5 class="modal-title">Add Course</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control mb-2" placeholder="Course Name">
        <input type="text" class="form-control mb-2" placeholder="Category">
        <input type="text" class="form-control" placeholder="Duration">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-pink">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection