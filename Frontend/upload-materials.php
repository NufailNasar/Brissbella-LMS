<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('header.php');
include('db_connect.php');

// Handle file upload on form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $course_id = $_POST['course'];

    // File handling
    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $file = $_FILES['material'];
    $file_name = basename($file['name']);
    $file_tmp = $file['tmp_name'];
    $file_type = $file['type'];
    $file_size = $file['size'];

    $allowed_types = [
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
    ];

    if (!in_array($file_type, $allowed_types)) {
        echo "<script>alert('Invalid file type. Only PDF, DOC, and DOCX are allowed.');</script>";
    } elseif ($file_size > 5 * 1024 * 1024) {
        echo "<script>alert('File is too large. Maximum allowed size is 5MB.');</script>";
    } else {
        $new_filename = time() . '_' . $file_name;
        $destination = $upload_dir . $new_filename;

        if (move_uploaded_file($file_tmp, $destination)) {
            // Save record to database
            $stmt = $conn->prepare("INSERT INTO materials (title, course_id, filename) VALUES (?, ?, ?)");
            $stmt->bind_param("sis", $title, $course_id, $new_filename);

            if ($stmt->execute()) {
                echo "<script>alert('Material uploaded successfully.');</script>";
            } else {
                echo "<script>alert('Failed to save record in the database.');</script>";
            }

            $stmt->close();
        } else {
            echo "<script>alert('Failed to move the uploaded file.');</script>";
        }
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Course Materials</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Upload Section -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Upload Course Materials</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Material Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter material title" required>
            </div>

            <div class="mb-3">
                <label for="course" class="form-label">Select Course</label>
                <select class="form-select" id="course" name="course" required>
                    <option value="">-- Select Course --</option>
                    <option value="1">Hair & Beauty Techniques</option>
                    <option value="2">Makeup Artistry</option>
                    <option value="3">Nail Technology</option>
                    <!-- Add more courses or fetch from DB dynamically -->
                </select>
            </div>

            <div class="mb-3">
                <label for="material" class="form-label">Choose File</label>
                <input class="form-control" type="file" id="material" name="material" required>
                <div class="form-text">Accepted file types: PDF, DOC, DOCX. Max size: 5MB.</div>
            </div>

            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
