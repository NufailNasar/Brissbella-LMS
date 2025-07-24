<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Basic Beauty Course - Course Detail</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .video-container {
      position: relative;
      padding-bottom: 56.25%;
      height: 0;
      overflow: hidden;
      margin-bottom: 1rem;
    }
    .video-container iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }
  </style>
</head>
<body class="container mt-5 mb-5">

  <h2>Basic Beauty Course</h2>
  <p><strong>Instructor:</strong> Ms. Kaveesha Silva</p>

  <!-- Progress Tracking -->
  <div class="mb-4">
    <label><strong>Progress:</strong></label>
    <div class="progress">
      <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
    </div>
  </div>

  <!-- Video Lectures -->
  <h4>Video Lectures</h4>
  <div class="row">
    <div class="col-md-6">
      <div class="video-container">
        <iframe src="https://www.youtube.com/embed/xZRsET_MUEg" frameborder="0" allowfullscreen></iframe>
      </div>
      <p><strong>Lesson 1:</strong> Introduction to Skin Care</p>
    </div>
    <div class="col-md-6">
      <div class="video-container">
        <iframe src="https://www.youtube.com/embed/8e631N8COh4" frameborder="0" allowfullscreen></iframe>
      </div>
      <p><strong>Lesson 2:</strong> Cleansing & Toning Demo</p>
    </div>
  </div>

  <!-- Lesson Contents -->
  <h4 class="mt-5">Lesson Contents</h4>
  <ul class="list-group mb-4">
    <li class="list-group-item">📘 Skin Anatomy Overview</li>
    <li class="list-group-item">🧼 Facial Cleansing Techniques</li>
    <li class="list-group-item">💧 Moisturizing Methods</li>
    <li class="list-group-item">📝 Client Consultation Guidelines</li>
  </ul>

  <!-- Assignments -->
  <h4>Assignments</h4>
  <table class="table table-striped mb-4">
    <thead><tr><th>Title</th><th>Due Date</th><th>Status</th><th>Action</th></tr></thead>
    <tbody>
      <tr>
        <td>Facial Theory MCQ</td>
        <td>2025-08-05</td>
        <td><span class="badge bg-warning text-dark">Pending</span></td>
        <td><a href="assignment_facial_mcq.php" class="btn btn-sm btn-outline-primary">Start</a>
</td>
      </tr>
      <tr>
        <td>Demo Video Submission</td>
        <td>2025-08-12</td>
        <td><span class="badge bg-secondary">Not Started</span></td>
        <td><button class="btn btn-sm btn-outline-secondary">Upload</button></td>
      </tr>
    </tbody>
  </table>

  <!-- Course Materials -->
  <h4>Course Materials</h4>
  <ul class="list-group">
    <li class="list-group-item">📄 <a href="#">Facial Theory Notes (PDF)</a></li>
    <li class="list-group-item">📊 <a href="#">Skin Type Chart (JPG)</a></li>
    <li class="list-group-item">📝 <a href="#">Client Form Template (DOCX)</a></li>
  </ul>

  <!-- Back Button -->
  <div class="mt-4">
    <a href="Studenthomepage.php" class="btn btn-secondary">← Back to Dashboard</a>
  </div>

</body>
</html>
