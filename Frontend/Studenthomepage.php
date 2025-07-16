<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include('header.php');
include('connection.php');

// Dummy user data for example (replace with DB fetch using session data)
$studentName = "Ashan Lakpradeepa";
$studentShortName = explode(' ', trim($studentName))[0];
$studentPhoto = isset($_SESSION['student_photo']) ? $_SESSION['student_photo'] : 'img/default-profile.png';
?>

<body>
<!-- Student Dashboard Navbar/Profile -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Brissbella LMS</a>
        <div class="d-flex align-items-center">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                    <img src="<?= $studentPhoto ?>" alt="Profile" class="rounded-circle me-2" style="width: 40px; height: 40px;">
                    <span><?= htmlspecialchars($studentShortName) ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="edit-profile.php">Edit Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>


<!-- Enrolled Courses Section -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Enrolled Courses</h2>
    <div class="row">
        <!-- Dummy Course (Loop this from DB) -->
        <div class="col-md-4">
            <div class="card">
                <img src="img/basic-beauty.jpg" class="card-img-top" alt="Course Image">
                <div class="card-body">
                    <h5 class="card-title">Basic Beauty Course</h5>
                    <p class="card-text">Status: <span class="text-success">Ongoing</span></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Payment Due Section -->
<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Due Payments</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Month</th>
                <th>Due Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dummy data (loop from DB) -->
            <tr>
                <td>July</td>
                <td>Rs. 7,500</td>
                <td><span class="text-danger">Unpaid</span></td>
            </tr>
            <tr>
                <td>August</td>
                <td>Rs. 7,500</td>
                <td><span class="text-success">Paid</span></td>
            </tr>
        </tbody>
    </table>
</div>

<?php include('footer.php'); ?>
</body>

</html>
