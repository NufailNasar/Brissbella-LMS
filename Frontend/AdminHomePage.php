<?php
session_start();
include('header.php');
include('db_connect.php');

// Dummy Admin Info (should be fetched from DB using session data)
$adminName = $_SESSION['admin_name'] ?? "Admin User";
$adminShortName = explode(' ', trim($adminName))[0];
$adminPhoto = $_SESSION['admin_photo'] ?? 'img/admin-default.png';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Brissbella LMS</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <div class="d-flex align-items-center">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center text-white" href="#" role="button" data-bs-toggle="dropdown">
                    <img src="<?= $adminPhoto ?>" alt="Admin" class="rounded-circle me-2" style="width: 40px; height: 40px;">
                    <span><?= htmlspecialchars($adminShortName) ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="edit-admin-profile.php">Edit Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Dashboard Content -->
<div class="container mt-5">
    <h3 class="mb-4">Welcome, <?= htmlspecialchars($adminShortName) ?> 👋</h3>

    <div class="row g-4">
        <!-- Courses Management -->
        <div class="col-md-4">
            <div class="card border-primary h-100">
                <div class="card-body">
                    <h5 class="card-title">Manage Courses</h5>
                    <p class="card-text">Add, update, or delete course offerings.</p>
                    <a href="manage-courses.php" class="btn btn-primary w-100">Go to Courses</a>
                </div>
            </div>
        </div>

        <!-- Registered Users -->
        <div class="col-md-4">
            <div class="card border-success h-100">
                <div class="card-body">
                    <h5 class="card-title">View Users</h5>
                    <p class="card-text">Check registered Students, Instructors, and Admins.</p>
                    <a href="view-users.php" class="btn btn-success w-100">View All Users</a>
                </div>
            </div>
        </div>

        <!-- Payments Overview -->
        <div class="col-md-4">
            <div class="card border-warning h-100">
                <div class="card-body">
                    <h5 class="card-title">Payment Summary</h5>
                    <p class="card-text">Check all dues, paid amounts & monthly analytics.</p>
                    <a href="payment-summary.php" class="btn btn-warning w-100">View Payments</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="row mt-5">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h6 class="card-title">Total Students</h6>
                    <h4 class="card-text">85</h4> <!-- Replace with DB Count -->
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-body">
                    <h6 class="card-title">Total Instructors</h6>
                    <h4 class="card-text">12</h4> <!-- Replace with DB Count -->
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h6 class="card-title">Active Courses</h6>
                    <h4 class="card-text">5</h4> <!-- Replace with DB Count -->
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h6 class="card-title">Pending Dues</h6>
                    <h4 class="card-text">Rs. 120,000</h4> <!-- Replace with DB Sum -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
