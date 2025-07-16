<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>
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
                <form action="signin.php" method="post">
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
