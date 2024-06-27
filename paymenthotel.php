<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        .containe {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .details {
            background-color: #ffffff;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        .details p {
            margin: 10px 0;
            font-size: 16px;
        }

        .payment-form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        .payment-method-select, .payment-input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .payment-submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .payment-submit-btn:hover {
            background-color: #218838;
        }

        .payment-details {
            display: none;
        }
    </style>
</head>
<body>
<?php

// Check if the reservation form has been submitted
if (isset($_GET['reservation_id'])) {
    $reservationId = intval($_GET['reservation_id']); // Sanitize input

    // Fetch reservation details
    $query = "SELECT 
    reservations.*, 
    hotel.name, 
    hotel.price,
    users.user_name
FROM 
    reservations
JOIN 
    hotel 
ON 
    reservations.hotel_id = hotel.hotel_id
JOIN 
    users 
ON 
    reservations.user_id = users.user_id
WHERE 
    reservations.reservation_id = ?;";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $reservationId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $reservation = $result->fetch_assoc();
        $hotelName = $reservation['name'];
        $totalPrice = $reservation['total_price'];
        $checkIn = $reservation['check_in_date'];
        $checkOut = $reservation['check_out_date'];
        $user_name = $reservation['user_name'];

        // Display payment details
        echo "<div class='containe text-capitalize'>";
        echo "<h2>Payment Details</h2>";
        echo "<div class='details'>";
        echo "<p><b>Customer Name:</b> $user_name</p>";
        echo "<p><b>Hotel Name:</b> $hotelName</p>";
        echo "<p><b>Check-in Date:</b> $checkIn</p>";
        echo "<p><b>Check-out Date:</b> $checkOut</p>";
        echo "<p><b>Total Price:</b> $totalPrice TK</p>";
        echo "</div>";

        // Payment form
        echo "<form id='payment_form' action='gpdf_pdf.php' method='post' class='payment-form'>";
        echo "<input type='hidden' name='reservation_id' value='$reservationId'>";
        echo "<input type='hidden' name='total_price' value='$totalPrice'>";

        echo "<label for='payment_method'>Payment Method:</label>";
        echo "<select id='payment_method' name='payment_method' required class='payment-method-select'>";
        echo "<option value='' selected disabled>Select</option>";
        echo "<option value='card'>Credit/Debit Card</option>";
        echo "<option value='mobile_banking'>Mobile Banking</option>";
        echo "</select>";

        // Card payment details
        echo "<div id='card_payment' class='payment-details'>";
        echo "<label for='card_number'>Card Number:</label>";
        echo "<input type='text' id='card_number' name='card_number' class='payment-input'> <br>";
        echo "<label for='card_expiry'>Expiry Date (MM/YY):</label>";
        echo "<input type='text' id='card_expiry' name='card_expiry' class='payment-input'>";
        echo "<label for='card_cvc'>CVC:</label>";
        echo "<input type='text' id='card_cvc' name='card_cvc' class='payment-input'>";
        echo "</div>";

        // Mobile banking payment details
        echo "<div id='mobile_banking_payment' class='payment-details'>";
        echo "<label for='mobile_banking_number'>Mobile Banking Number:</label>";
        echo "<input type='text' id='mobile_banking_number' name='mobile_banking_number' class='payment-input'>";
        echo "<label for='transaction_id'>Transaction ID:</label>";
        echo "<input type='text' id='transaction_id' name='transaction_id' class='payment-input'>";
        echo "</div>";

        echo "<input type='submit' value='Make Payment' class='payment-submit-btn'>";
        echo "</form>";

        echo "</div>";
    } else {
        echo "Reservation not found.";
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

include("footer.php");
?>

<script>
    document.getElementById('payment_method').addEventListener('change', function () {
        var paymentMethod = this.value;
        document.getElementById('card_payment').style.display = paymentMethod === 'card' ? 'block' : 'none';
        document.getElementById('mobile_banking_payment').style.display = paymentMethod === 'mobile_banking' ? 'block' : 'none';
    });

    document.getElementById('payment_form').addEventListener('submit', function(event) {
        // Remove event.preventDefault(); to allow form submission
    });
</script>
</body>
</html>
