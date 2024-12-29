<?php
// Include the database connection
require_once 'db_connection.php'; // Ensure this points to the correct file path

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $password = password_hash($_POST['password'] ?? '', PASSWORD_BCRYPT); // Hash the password for security

    try {
        // Prepare SQL query to insert customer data
        $query = "INSERT INTO Customers (name, email, phone, address, password) VALUES (:name, :email, :phone, :address, :password)";
        $stmt = $conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':password', $password);

        // Execute the query
        $stmt->execute();

        // Redirect or show success message
        echo "Registration successful! <a href='../frontend/login.php'>Click here to login</a>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}
?>
