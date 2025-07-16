<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
<body>

<!-- Signup Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="section-title bg-white text-center text-primary px-3">Register</h6>
            <h1 class="mb-4">Create Your Account</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="signup.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full Name" required>
                        <label for="fullname">Full Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email address" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
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
<!-- Signup End -->

<?php include('footer.php'); ?>
</body>
</html>
