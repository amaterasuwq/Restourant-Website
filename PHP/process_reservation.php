<?php
include 'db_connection.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$guests = $_POST['guests'];

$sql = "INSERT INTO reservations (name, email, phone, date, time, guests) 
VALUES ('$name', '$email', '$phone', '$date', '$time', '$guests')";

if ($conn->query($sql) === TRUE) {
    header("location: view_reservations.php");
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>