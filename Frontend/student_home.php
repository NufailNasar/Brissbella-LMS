<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: signin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>
<div class="container-xxl py-5">
    <div class="container text-center">
        <h1>Welcome to Student Home</h1>
        <p>You are logged in as <strong><?php echo $_SESSION['email']; ?></strong></p>
        <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
    </div>
</div>
<?php include('footer.php'); ?>
</body>
</html>
