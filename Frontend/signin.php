<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>

<?php
session_start();
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($hashed_password, $role);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user'] = $email;
            $_SESSION['role'] = $role;

            // Redirect based on role
            if ($role == 'student') {
                echo "<script>window.location.href='Studenthomepage.php';</script>";
            } elseif ($role == 'instructor') {
                echo "<script>window.location.href='Instructorhomepage.php';</script>";
            } elseif ($role == 'admin') {
                echo "<script>window.location.href='http://127.0.0.1:8005/';</script>";
            } else {
                echo "<script>alert('Unknown role.');</script>";
            }
            exit();
        } else {
            echo "<script>alert('Incorrect password.');</script>";
        }
    } else {
        echo "<script>alert('No account found with that email.');</script>";
    }

    $conn->close();
}
?>

<body>
<!-- Signin Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="section-title bg-white text-center text-primary px-3">Login</h6>
            <h1 class="mb-4">Access Your Account</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="" method="post">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary py-3">Sign In</button>
                    </div>
                </form>
                <div class="mt-3 text-center">
                    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Signin End -->

<?php include('footer.php'); ?>
</body>
</html>
