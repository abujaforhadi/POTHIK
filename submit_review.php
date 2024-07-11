<?php
require('database/connection.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tour_id = $_POST['tour_id'];
    $username = $_POST['username'];
    $comment = $_POST['comment'];
    $rating = (int) $_POST['rating']; 


    $stmt = $con->prepare("INSERT INTO reviews (tour_id, username, comment, rating, created_at) VALUES (?, ?, ?, ?, NOW())");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($con->error));
    }

    $bind = $stmt->bind_param("isss", $tour_id, $username, $comment, $rating);
    if ($bind === false) {
        die('Bind failed: ' . htmlspecialchars($stmt->error));
    }

   
    if ($stmt->execute()) {
        header("Location: place.php?tour_id=" . $tour_id . "&success=1");
        exit;
    } else {
        header("Location: place.php?tour_id=" . $tour_id . "&error=1");
        exit;
    }

    $stmt->close();
}

$con->close();
?>
