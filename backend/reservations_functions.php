<?php
function reserveCar($conn, $customer_id, $car_plate_id, $pickup_date, $return_date) {
    try {
        // Check if the car is available (status should be 'active')
        $sql = "SELECT * FROM Cars WHERE plate_id = ? AND status = 'active'";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$car_plate_id]);
        $car = $stmt->fetch();

        if ($car) {
            // Car is available, proceed with reservation
            $sql = "INSERT INTO Reservations (customer_id, plate_id, pickup_date, return_date) 
                    VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$customer_id, $car_plate_id, $pickup_date, $return_date]);

            // Update car status to 'rented'
            $sql = "UPDATE Cars SET status = 'rented' WHERE plate_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$car_plate_id]);

            echo "Car reserved successfully!";
        } else {
            echo "Car is not available for reservation.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
