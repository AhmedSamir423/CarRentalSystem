<?php
$host = "localhost";
$db = "carrentalsystem"; // your database name
$user = "root"; // default user for XAMPP/WAMP
$pass = ""; // default password for XAMPP/WAMP is empty

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
