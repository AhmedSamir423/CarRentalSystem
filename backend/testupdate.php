<?php
include 'db_connection.php';
include 'reservations_functions.php';

// Test: Reserve a car for a customer
reserveCar($conn, 1, 'XYZ123', '2024-12-28', '2024-12-30');
?>
