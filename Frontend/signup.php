<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>

<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('db_connect.php');

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // Check if email already exists
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "<script>alert('Email already registered. Please use another.');</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (fullname, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fullname, $email, $password, $role);

        if ($stmt->execute()) {
            $_SESSION['user'] = $email;
            echo "<script>window.location.href='signin.php';</script>";
            exit();
        } else {
            echo "<script>alert('Error saving your data.');</script>";
        }
    }

    $conn->close();
}
?>

<body>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="section-title bg-white text-primary px-3">Register</h6>
            <h1 class="mb-4">Create Your Account</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full Name" required>
                        <label for="fullname">Full Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-4">
                        <select class="form-select" name="role" id="role" required>
                            <option value="" disabled selected>Select your role</option>
                            <option value="student">Student</option>
                            <option value="instructor">Instructor</option>
                            <option value="admin">Admin</option>
                        </select>
                        <label for="role">Select Role</label>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary py-3">Sign Up</button>
                    </div>
                </form>
                <div class="mt-3 text-center">
                    <p>Already have an account? <a href="signin.php">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
</body>
</html>
