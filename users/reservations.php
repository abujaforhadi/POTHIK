<?php
ob_start();


include("../header.php");
?>

<?php


# database


// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit;
}

// Fetch reservations for the logged-in user
$userId = $_SESSION['user_id'];
$query = "SELECT reservations.*, home.name, home.image_path 
          FROM reservations 
          INNER JOIN home ON reservations.home_id = home.home_id 
          WHERE reservations.user_id = $userId";
$result = $con->query($query);

$reservations = array();
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reservations[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/reservation.css">

    <link rel="stylesheet" href="../assets/css/responsive.css">
</head>

<body>
    <!-- Nav Bar -->

    <div class="containe">
        <?php
        if (!empty($reservations)) {
            echo "<ul class='reservation-list'>";
            foreach ($reservations as $reservation) {
                echo "<li class='reservation-item'>";
                echo "<img src='{$reservation['image_path']}' alt='{$reservation['name']}' class='home-image'>";
                echo "<div class='reservation-details'>";
                echo "<p><strong>Home:</strong> {$reservation['name']}</p>";
                echo "<p><strong>Check-in:</strong> {$reservation['check_in_date']}</p>";
                echo "<p><strong>Check-out:</strong> {$reservation['check_out_date']}</p>";
                echo "<p><strong>Total Price:</strong> {$reservation['total_price']} TK</p>";
                echo "<form method='post' action='cancel_booking.php'>";
                echo "<input type='hidden' name='reservation_id' value='{$reservation['reservation_id']}'>";
                echo "<button type='submit' class='cancel-button' name='cancel_booking'>Cancel Booking</button>";
                echo "</form>";
                echo "</div>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No reservations found.</p>";
        }
        ?>
    </div>

    <!-- Footer -->
    <?php include("../footer.php"); ?>
</body>

</html>