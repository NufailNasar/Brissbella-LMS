<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('header.php');
include('db_connect.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Course Materials</title>
</head>

<body>


    <!-- Upload Section -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Upload Course Materials</h2>
        <form>
            <div class="mb-3">
                <label for="title" class="form-label">Material Title</label>
                <input type="text" class="form-control" id="title" placeholder="Enter material title" required>
            </div>

            <div class="mb-3">
                <label for="course" class="form-label">Select Course</label>
                <select class="form-select" id="course" required>
                    <option value="">-- Select Course --</option>
                    <option value="1">Hair & Beauty Techniques</option>
                    <option value="2">Makeup Artistry</option>
                    <option value="3">Nail Technology</option>
                    <!-- Add more course options as needed -->
                </select>
            </div>

            <div class="mb-3">
                <label for="material" class="form-label">Choose File</label>
                <input class="form-control" type="file" id="material" required>
                <div class="form-text">Accepted file types: PDF, DOC, DOCX</div>
            </div>

            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>


    <?php include('footer.php'); ?>
</body>

</html>