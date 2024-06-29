<?php
session_start();

$con = new mysqli("localhost", "root", "", "travel");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$user_id = $_POST['user_id'];
$tour_id = $_POST['tour_id'];
$adults = $_POST['adults'];
$children = $_POST['children'];
$total_price = $_POST['total_price'];

$sql = "INSERT INTO booking_tour (user_id, tour_id, adults, children, total_price) VALUES (?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql);

if ($stmt === false) {
    die("Error preparing the statement: " . $con->error);
}

$stmt->bind_param("iiiii", $user_id, $tour_id, $adults, $children, $total_price);

if ($stmt->execute() === false) {
    die("Error executing the statement: " . $stmt->error);
}

$booking_id = $stmt->insert_id;

$stmt->close();
$con->close();

header("Location: confirmation.php?booking_id=" . $booking_id);
exit();
?>
