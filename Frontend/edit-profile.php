<?php
include('header.php');
include('connection.php');
session_start();

// Replace this with actual logged-in user's email from session
$studentEmail = $_SESSION['student_email'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $contact = $_POST['contact'];
    $age = $_POST['age'];
    $location = $_POST['location'];
    $nic = $_POST['nic'];
    $profile_photo = '';

    if (!empty($_FILES["profile_photo"]["name"])) {
        $target_dir = "uploads/";
        $profile_photo = $target_dir . basename($_FILES["profile_photo"]["name"]);
        move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $profile_photo);
    }

    $stmt = $conn->prepare("SELECT id FROM student_profiles WHERE email = ?");
    $stmt->bind_param("s", $studentEmail);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Update
        $stmt = $conn->prepare("UPDATE student_profiles SET fullname=?, contact=?, age=?, location=?, nic=?, profile_photo=? WHERE email=?");
        $stmt->bind_param("ssissss", $fullname, $contact, $age, $location, $nic, $profile_photo, $studentEmail);
    } else {
        // Insert
        $stmt = $conn->prepare("INSERT INTO student_profiles (fullname, email, contact, age, location, nic, profile_photo) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisss", $fullname, $studentEmail, $contact, $age, $location, $nic, $profile_photo);
    }

    if ($stmt->execute()) {
        $message = "Profile updated successfully!";
    } else {
        $message = "Error updating profile.";
    }
}

// Fetch current values
$profile = [];
if ($studentEmail) {
    $result = $conn->query("SELECT * FROM student_profiles WHERE email='$studentEmail'");
    if ($result && $result->num_rows > 0) {
        $profile = $result->fetch_assoc();
    }
}
?>

<div class="container-xxl py-5">
    <div class="container">
        <h2 class="text-center mb-4">Edit Student Profile</h2>
        <?php if (!empty($message)) echo "<div class='alert alert-info'>$message</div>"; ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Full Name</label>
                    <input type="text" name="fullname" class="form-control" value="<?= $profile['fullname'] ?? '' ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Contact Number</label>
                    <input type="text" name="contact" class="form-control" value="<?= $profile['contact'] ?? '' ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Age</label>
                    <input type="number" name="age" class="form-control" value="<?= $profile['age'] ?? '' ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control" value="<?= $profile['location'] ?? '' ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label>NIC Number</label>
                    <input type="text" name="nic" class="form-control" value="<?= $profile['nic'] ?? '' ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Upload Profile Photo</label>
                    <input type="file" name="profile_photo" class="form-control">
                    <?php if (!empty($profile['profile_photo'])): ?>
                        <img src="<?= $profile['profile_photo'] ?>" alt="Profile" style="height: 100px; margin-top: 10px;">
                    <?php endif; ?>
                </div>
                <div class="col-12 mt-4 text-center">
                    <button type="submit" class="btn btn-primary px-5">Update Profile</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include('footer.php'); ?>
