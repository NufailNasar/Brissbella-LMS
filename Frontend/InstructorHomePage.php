<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include('header.php');
include('db_connect.php');

// Dummy instructor data (replace with session + DB data)
$instructorName = "Ms. Nadeesha Perera";
$instructorShortName = explode(' ', trim($instructorName))[0];
$instructorPhoto = $_SESSION['instructor_photo'] ?? 'img/default-profile.png';
?>

<body>
<!-- Instructor Dashboard Navbar/Profile -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Instructor Dashboard</a>
        <div class="d-flex align-items-center">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                    <img src="<?= $instructorPhoto ?>" alt="Profile" class="rounded-circle me-2" style="width: 40px; height: 40px;">
                    <span><?= htmlspecialchars($instructorShortName) ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="edit-instructor-profile.php">Edit Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Assigned Courses Section -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Your Assigned Courses</h2>
    <div class="row">
        <!-- Dummy Course -->
        <div class="col-md-4">
            <div class="card">
                <img src="img/hair-course.jpg" class="card-img-top" alt="Course Image">
                <div class="card-body">
                    <h5 class="card-title">Hair & Beauty Techniques</h5>
                    <p class="card-text">Total Students: 18</p>
                    <a href="manage-course.php?course_id=1" class="btn btn-primary w-100">Manage Course</a>
                </div>
            </div>
        </div>
        <!-- More cards can loop here -->
    </div>
</div>

<!-- Student List Section -->
<!-- Student List Section -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Your Students</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Course</th>
                <th>Contact</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
         <?php
include('db_connect.php'); // Connect to DB

     $query = "SELECT f_name, mobile, status FROM students";
// $query = "SELECT s.f_name, s.mobile, s.status, courses.name AS course_name 
//           FROM students AS s 
//           LEFT JOIN courses ON courses.id = s.cid";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $statusClass = $row['status'] === 'Active' ? 'text-success' : 'text-danger';
        echo "<tr>
            <td>{$row['f_name']}</td> <!-- Student Name -->
            <td>{$row['mobile']}</td> <!-- Course -->
            <td>{$row['mobile']}</td> <!-- Contact -->
            <td><span class='$statusClass'>{$row['status']}</span></td> <!-- Status -->
        </tr>";
    }
} else {
    echo "<tr><td colspan='4' class='text-center'>No students found.</td></tr>";
}

$conn->close();
?>

        </tbody>
    </table>
</div>


<!-- Payment Follow-up Section -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Payment Follow-Up</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Month</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dummy data -->
            <tr>
                <td>Dinithi Senanayake</td>
                <td>July</td>
                <td><span class="text-danger">Unpaid</span></td>
            </tr>
            <tr>
                <td>Harshi Dilhara</td>
                <td>July</td>
                <td><span class="text-success">Paid</span></td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Upload Materials Section -->
<div class="container mt-5 mb-5 text-center">
    <a href="upload-materials.php" class="btn btn-success btn-lg">Upload Course Materials</a>
</div>

<?php include('footer.php'); ?>
</body>
</html>
