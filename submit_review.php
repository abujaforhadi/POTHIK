<?php
// Database connection
require('database/connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tour_id = $_POST['tour_id'];
    $username = $_POST['username'];
    $comment = $_POST['comment'];
    $rating = (int) $_POST['rating']; // Ensure rating is an integer

    // Prepare and bind
    $stmt = $con->prepare("INSERT INTO reviews (tour_id, username, comment, rating, created_at) VALUES (?, ?, ?, ?, NOW())");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($con->error));
    }

    $bind = $stmt->bind_param("isss", $tour_id, $username, $comment, $rating);
    if ($bind === false) {
        die('Bind failed: ' . htmlspecialchars($stmt->error));
    }

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to the tour details page with a success message
        header("Location: place.php?tour_id=" . $tour_id . "&success=1");
        exit;
    } else {
        // Redirect back to the tour details page with an error message
        header("Location: place.php?tour_id=" . $tour_id . "&error=1");
        exit;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$con->close();
?>
