<?php
session_start();

$booking_id = $_GET['booking_id'] ?? null;

if ($booking_id === null) {
    echo "No booking ID provided.";
    exit();
}

$con = new mysqli("localhost", "root", "", "travel");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$stmt = $con->prepare("SELECT * FROM bookings WHERE booking_id = ?");
$stmt->bind_param("i", $booking_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $booking = $result->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Booking Confirmation</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f8f9fa;
                margin: 0;
                padding: 20px;
                text-align: center;
            }

            .confirmation {
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                margin: 20px auto;
                max-width: 600px;
            }

            h1 {
                color: #28a745;
            }

            p {
                font-size: 18px;
                color: #555;
            }
        </style>
    </head>

    <body>
        <div class="confirmation">
            <h1>Booking Confirmed!</h1>
            <p>Thank you for your booking. Your booking ID is <strong><?php echo $booking_id; ?></strong>.</p>
            <p>Details:</p>
            <p>User ID: <?php echo $booking['user_id']; ?></p>
            <p>Tour ID: <?php echo $booking['tour_id']; ?></p>
            <p>Adults: <?php echo $booking['adults']; ?></p>
            <p>Children: <?php echo $booking['children']; ?></p>
            <p>Total Price: <?php echo $booking['total_price']; ?> TK</p>
        </div>
    </body>

    </html>
    <?php
} else {
    echo "No booking found with ID " . htmlspecialchars($booking_id);
}

$stmt->close();
$con->close();
?>
