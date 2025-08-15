<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include('Aheader.php');
include('db_connect.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

$sid = $_SESSION['user_id'];

// Fetch student's name
$stmt = $conn->prepare("
    SELECT CONCAT(f_name, ' ', l_name) AS full_name 
    FROM students 
    WHERE uid = ?
    LIMIT 1
");
$stmt->bind_param("i", $sid);
$stmt->execute();
$stmt->bind_result($studentName);
$stmt->fetch();
$stmt->close();

// Fallback if no name found
if (empty($studentName)) {
    $studentName = "Student";
}

$studentShortName = explode(' ', trim($studentName))[0];

// Fetch all course materials related to student's enrolled courses
$sql4 = "
    SELECT m.* FROM materials m
    JOIN students s ON m.course_id = s.cid
    WHERE s.uid = ?
    ORDER BY m.uploaded_at DESC
";
$stmt = $conn->prepare($sql4);
$stmt->bind_param("i", $sid);
$stmt->execute();
$resultMaterials = $stmt->get_result();
?>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Welcome, <?= htmlspecialchars($studentShortName) ?>!</h2>

            <?php
            $studentPhoto = isset($_SESSION['student_photo']) && !empty($_SESSION['student_photo'])
                ? $_SESSION['student_photo']
                : 'https://www.w3schools.com/howto/img_avatar.png';
            ?>
            <img src="<?= htmlspecialchars($studentPhoto) ?>" alt="Profile" class="rounded-circle"
                style="width: 50px; height: 50px;">
        </div>

        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs mb-4" id="dashboardTab" role="tablist">
            <li class="nav-item"><button class="nav-link active" id="courses-tab" data-bs-toggle="tab"
                    data-bs-target="#courses" type="button">Courses</button></li>
            <li class="nav-item"><button class="nav-link" id="assignments-tab" data-bs-toggle="tab"
                    data-bs-target="#assignments" type="button">Assignments</button></li>
            <li class="nav-item"><button class="nav-link" id="payments-tab" data-bs-toggle="tab"
                    data-bs-target="#payments" type="button">Payments</button></li>
            <li class="nav-item"><button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                    data-bs-target="#profile" type="button">Profile</button></li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="dashboardTabContent">
            <div class="tab-pane fade show active" id="courses">
                <!-- Enrolled Courses -->
                <h4>Enrolled Courses</h4>

                <?php
                $sql = "
                    SELECT 
                        c.*, 
                        CONCAT(l.f_name, ' ', l.l_name) AS instructor_name
                    FROM students s
                    JOIN cources c ON c.id = s.cid
                    JOIN lectures l ON l.bid = s.bid AND l.cid = s.cid
                    WHERE s.uid = ?
                    LIMIT 1
                ";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $sid);
                $stmt->execute();
                $result = $stmt->get_result();
                $course = $result->fetch_assoc();
                $stmt->close();
                ?>

                <?php if ($course): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <?php
                            $img = !empty($course['image'])
                                ? "http://127.0.0.1:8005/" . $course['image']
                                : 'img/basic-beauty.jpg';
                            ?>
                            <img src="<?= htmlspecialchars($img) ?>" class="card-img-top" alt="Course Image">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($course['name']) ?></h5>
                                <p>Instructor: <?= htmlspecialchars($course['instructor_name']) ?></p>
                                <div class="mb-2">
                                    <label>Progress:</label>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 60%;"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                            60%
                                        </div>
                                    </div>
                                </div>
                                <a href="course_view.php?course_id=<?= $course['id'] ?>"
                                    class="btn btn-sm btn-outline-primary mt-2">Continue</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Available Courses -->
                <h4 class="mt-5">Available Courses</h4>
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM cources WHERE is_active = 1 ORDER BY created_at DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0):
                        while ($course = $result->fetch_assoc()):
                            $courseId = $course['id'];
                            $courseName = $course['name'] ?? 'Unnamed Course';
                            $courseCategory = $course['category'] ?? 'N/A';
                            $courseDuration = $course['durrarion'] ?? 'Not Specified';
                            $courseFee = isset($course['fee']) && $course['fee'] !== null ? 'Rs. ' . number_format($course['fee'], 2) : 'Free';
                            $courseImage = !empty($course['image']) ? "http://127.0.0.1:8005/" . $course['image'] : 'img/default-course.jpg';

                            // Get instructor for this course
                            $instructorSql = "SELECT * FROM lectures WHERE cid = $courseId LIMIT 1";
                            $instructorResult = $conn->query($instructorSql);
                            if ($instructorResult->num_rows > 0) {
                                $instructor = $instructorResult->fetch_assoc();
                                $firstName = $instructor['Address'] ?? '';
                                $instructorName = htmlspecialchars($instructor['l_name'] . ' ' . $firstName);
                            } else {
                                $instructorName = "TBD";
                            }
                            ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow">
                                    <img src="<?= htmlspecialchars($courseImage) ?>" class="card-img-top" alt="Course Image"
                                        style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($courseName) ?></h5>
                                        <p><strong>Instructor:</strong> <?= $instructorName ?></p>
                                        <p class="mb-1"><strong>Duration:</strong> <?= htmlspecialchars($courseDuration) ?></p>
                                        <p class="mb-1"><strong>Category:</strong> <?= htmlspecialchars($courseCategory) ?></p>
                                        <p class="mb-2"><strong>Course Fee:</strong> <?= htmlspecialchars($courseFee) ?></p>
                                        <a href="#" class="btn btn-sm btn-outline-success w-100">Enroll Now</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    else:
                        ?>
                        <div class="col-12">
                            <p class="text-muted">No available courses at the moment.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="tab-pane fade" id="assignments">
                <h4>Assignments</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Assignment</th>
                            <th>Due Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Basic Beauty Course</td>
                            <td>Facial Theory MCQ</td>
                            <td>2025-08-05</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                        </tr>
                        <tr>
                            <td>Advanced Hair Styling</td>
                            <td>Haircut Demo Submission</td>
                            <td>2025-08-10</td>
                            <td><span class="badge bg-success">Submitted</span></td>
                        </tr>
                    </tbody>
                </table>
                <div class="container py-5">
                    <h2 class="mb-4 text-center">Available Course Materials</h2>

                    <?php
                    if ($resultMaterials->num_rows > 0) {
                        echo '<table class="table table-bordered table-striped">';
                        echo '<thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Course ID</th>
                    <th>Filename</th>
                    <th>Uploaded At</th>
                    <th>Preview</th>
                    <th>Download</th>
                </tr>
              </thead>
              <tbody>';

                        while ($row = $resultMaterials->fetch_assoc()) {
                            $filePath = "uploads/" . $row['filename']; // Adjust path if needed
                    
                            echo "<tr>
                    <td>" . htmlspecialchars($row['title']) . "</td>
                    <td>" . htmlspecialchars($row['course_id']) . "</td>
                    <td>" . htmlspecialchars($row['filename']) . "</td>
                    <td>" . htmlspecialchars($row['uploaded_at']) . "</td>
                    <td>
                        <a href='" . htmlspecialchars($filePath) . "' target='_blank' class='btn btn-sm btn-primary'>Preview</a>
                    </td>
                    <td>
                        <a href='" . htmlspecialchars($filePath) . "' download class='btn btn-sm btn-success'>Download</a>
                    </td>
                  </tr>";
                        }

                        echo '</tbody></table>';
                    } else {
                        echo '<div class="alert alert-info">No materials available for your courses.</div>';
                    }
                    ?>
                </div>
            </div>

            <div class="tab-pane fade" id="payments">
                <h4>Payment Summary</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>July</td>
                            <td>Rs. 7,500</td>
                            <td><span class="badge bg-danger">Unpaid</span></td>
                            <td>
                                <button class="btn btn-sm btn-success pay-now-btn" data-bs-toggle="modal"
                                    data-bs-target="#paymentModal" data-month="July" data-amount="7500">
                                    Pay Now
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>August</td>
                            <td>Rs. 7,500</td>
                            <td><span class="badge bg-success">Paid</span></td>
                            <td>-</td>
                        </tr>
                    </tbody>

                </table>
            </div>

            <div class="tab-pane fade" id="profile">
                <h4>Profile Details</h4>
                <div class="card shadow-sm p-4">
                    <form id="profileForm">
                        <!-- Profile Picture -->
                        <div class="text-center mb-3">
                            <img src="<?= htmlspecialchars($studentPhoto) ?>" class="rounded-circle" alt="Profile Photo"
                                style="width: 100px; height: 100px;">
                        </div>

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label"><strong>Name</strong></label>
                            <input type="text" class="form-control" name="name" id="nameField"
                                value="<?= htmlspecialchars($studentName) ?>" disabled>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label"><strong>Email</strong></label>
                            <input type="email" class="form-control" name="email" id="emailField"
                                value="<?= htmlspecialchars($_SESSION['user'] ?? 'student@example.com') ?>" disabled>
                        </div>

                        <!-- Joined Course -->
                        <div class="mb-3">
                            <label class="form-label"><strong>Joined Course</strong></label>
                            <input type="text" class="form-control" value="Basic Beauty Course" disabled>
                        </div>

                        <!-- Registered Date -->
                        <div class="mb-3">
                            <label class="form-label"><strong>Registered Date</strong></label>
                            <input type="text" class="form-control" value="2025-07-01" disabled>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-3">
                            <button type="button" id="editBtn" class="btn btn-outline-primary">Edit Profile</button>
                            <button type="submit" id="saveBtn" class="btn btn-success d-none">Save Changes</button>
                            <button type="button" id="cancelBtn" class="btn btn-secondary d-none">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="paymentForm" method="POST" action="process_payment.php" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Confirm Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="month" id="paymentMonth">
                    <input type="hidden" name="amount" id="paymentAmount">

                    <p><strong>Month:</strong> <span id="displayMonth"></span></p>
                    <p><strong>Amount:</strong> Rs. <span id="displayAmount"></span></p>

                    <div class="mb-3">
                        <label><strong>Select Payment Method:</strong></label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="method" value="Card" required>
                            <label class="form-check-label">Card</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="method" value="Bank Slip">
                            <label class="form-check-label">Bank Slip</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="method" value="PayPal">
                            <label class="form-check-label">PayPal</label>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Confirm Payment</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>



    <?php include('footer.php'); ?>
</body>

</html>

<script>
    document.getElementById("editBtn").addEventListener("click", function () {
        document.getElementById("nameField").disabled = false;
        document.getElementById("emailField").disabled = false;
        document.getElementById("editBtn").classList.add("d-none");
        document.getElementById("saveBtn").classList.remove("d-none");
        document.getElementById("cancelBtn").classList.remove("d-none");
    });

    document.getElementById("cancelBtn").addEventListener("click", function () {
        document.getElementById("nameField").value = "<?= htmlspecialchars($studentName) ?>";
        document.getElementById("emailField").value = "<?= htmlspecialchars($_SESSION['user'] ?? 'student@example.com') ?>";
        document.getElementById("nameField").disabled = true;
        document.getElementById("emailField").disabled = true;
        document.getElementById("editBtn").classList.remove("d-none");
        document.getElementById("saveBtn").classList.add("d-none");
        document.getElementById("cancelBtn").classList.add("d-none");
    });

    document.querySelectorAll('.pay-now-btn').forEach(button => {
        button.addEventListener('click', function () {
            const month = this.getAttribute('data-month');
            const amount = this.getAttribute('data-amount');

            document.getElementById('paymentMonth').value = month;
            document.getElementById('paymentAmount').value = amount;
            document.getElementById('displayMonth').textContent = month;
            document.getElementById('displayAmount').textContent = amount;
        });
    });
</script>