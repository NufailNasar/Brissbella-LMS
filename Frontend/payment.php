<?php
session_start();
include('db_connect.php');
$month = $_GET['month'];
$amount = $_GET['amount'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Make Payment</title>
  <link href="bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h3>Pay Rs. <?= htmlspecialchars($amount) ?> for <?= htmlspecialchars($month) ?></h3>

  <form action="process_payment.php" method="POST">
    <input type="hidden" name="month" value="<?= htmlspecialchars($month) ?>">
    <input type="hidden" name="amount" value="<?= htmlspecialchars($amount) ?>">
    
    <div class="mb-3">
      <label><strong>Select Payment Method:</strong></label><br>
      <input type="radio" name="method" value="Card" required> Card<br>
      <input type="radio" name="method" value="Bank Slip"> Bank Slip<br>
      <input type="radio" name="method" value="PayPal"> PayPal
    </div>

    <button type="submit" class="btn btn-success">Confirm Payment</button>
  </form>
</body>
</html>
