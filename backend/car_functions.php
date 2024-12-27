<?php
include 'db_connection.php';

function addCar($conn, $plate_id, $model, $year, $status, $office_id) {
    $sql = "INSERT INTO Cars (plate_id, model, year, status, office_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$plate_id, $model, $year, $status, $office_id]);
    echo "Car added successfully!";
}

function updateCarStatus($conn, $plate_id, $status) {
    try {
        $sql = "UPDATE Cars SET status = ? WHERE plate_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$status, $plate_id]);
        echo "Car status updated successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
