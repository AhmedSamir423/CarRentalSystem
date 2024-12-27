<?php
include 'db_connection.php';
include 'customer_functions.php';

// Test: Register a new customer
registerCustomer($conn, 'John Doe', 'john.doe@example.com', '1234567890', '123 Main St');
?>
