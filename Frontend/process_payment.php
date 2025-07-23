<?php
session_start();
include('db_connect.php');

$studentEmail = $_SESSION['user'];
$month = $_POST['month'];
$amount = $_POST['amount'];
$method = $_POST['method'];

$status = "Paid";
$paidDate = date('Y-m-d');

// You must have a `payments` table
$stmt = $conn->prepare("UPDATE payments SET status = ?, method = ?, paid_date = ? WHERE student_email = ? AND month = ?");
$stmt->bind_param("sssss", $status, $method, $paidDate, $studentEmail, $month);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "<script>alert('Payment successful!'); window.location.href='student_dashboard.php';</script>";
} else {
    echo "<script>alert('Payment failed or already paid.'); window.location.href='student_dashboard.php';</script>";
}
