<?php
$host = "localhost";
$db = "brissbella_lms";
$user = "root";
$pass = "";

// Connection variable must be $conn
$conn = new mysqli($host, $user, $pass, $db);

// Check for connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
