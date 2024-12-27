

<!-- frontend/reserve.php -->
<?php
session_start();
if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}

include 'db_connection.php'; // Include the DB connection
// Fetch available cars
$sql = "SELECT * FROM Cars WHERE status = 'active'";
$stmt = $conn->query($sql);
$cars = $stmt->fetchAll();
?>

<form action="backend/reserve.php" method="POST">
    <label for="car">Select Car:</label>
    <select name="car_id" required>
        <?php foreach ($cars as $car) { ?>
            <option value="<?= $car['plate_id']; ?>"><?= $car['model']; ?> (<?= $car['plate_id']; ?>)</option>
        <?php } ?>
    </select><br>

    <label for="pickup_date">Pickup Date:</label>
    <input type="date" name="pickup_date" required><br>

    <label for="return_date">Return Date:</label>
    <input type="date" name="return_date" required><br>

    <input type="submit" value="Reserve">
</form>

<!-- backend/reserve.php -->
<?php
session_start();
include 'db_connection.php'; // Include the DB connection

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $car_id = $_POST['car_id'];
    $pickup_date = $_POST['pickup_date'];
    $return_date = $_POST['return_date'];
    $customer_id = $_SESSION['customer_id'];

    // Insert reservation into the Reservations table
    $sql = "INSERT INTO Reservations (customer_id, plate_id, pickup_date, return_date) 
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$customer_id, $car_id, $pickup_date, $return_date]);

    // Redirect to dashboard after reservation
    header("Location: dashboard.php");
    exit();
}
