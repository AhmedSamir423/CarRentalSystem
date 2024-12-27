<?php
function registerCustomer($conn, $name, $email, $phone, $address) {
    try {
        // Insert the new customer into the database
        $sql = "INSERT INTO Customers (name, email, phone, address) 
                VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $email, $phone, $address]);

        echo "Customer registered successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
function updateCustomer($conn, $customer_id, $name, $email, $phone, $address) {
    try {
        $sql = "UPDATE Customers SET name = ?, email = ?, phone = ?, address = ? WHERE customer_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $email, $phone, $address, $customer_id]);

        echo "Customer information updated successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
