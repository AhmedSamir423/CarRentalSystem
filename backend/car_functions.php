<?php
include 'db_connection.php';

function addCar($conn, $plate_id, $model, $year, $status, $office_id) {
    $sql = "INSERT INTO Cars (plate_id, model, year, status, office_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$plate_id, $model, $year, $status, $office_id]);
    echo "Car added successfully!";
}
?>
