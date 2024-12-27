<!-- backend/login.php -->
<?php
include 'db_connection.php'; // Include the DB connection
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the customer exists in the database
    $sql = "SELECT * FROM Customers WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $customer = $stmt->fetch();

    if ($customer && password_verify($password, $customer['password'])) {
        // Store customer ID in session and redirect to dashboard
        $_SESSION['customer_id'] = $customer['customer_id'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid email or password!";
    }
}
?>
<!-- frontend/login.php -->
<form action="backend/login.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br>

    <input type="submit" value="Login">
</form>
