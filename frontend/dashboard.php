
<!-- frontend/dashboard.php -->
<?php
session_start();
if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}
?>
<h1>Welcome to Your Dashboard</h1>
<p>Welcome, customer!</p>
<a href="reserve.php">Reserve a Car</a>
