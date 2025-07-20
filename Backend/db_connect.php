<?php
$host = "localhost";
$db = "brissbella_lms"; // Change this if needed
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
