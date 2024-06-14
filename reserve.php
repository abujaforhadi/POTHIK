<?php
# database
include ("header.php");

$reservationSuccess = false;
$reservationError = "";
$selectedHome = null;

// Check if the form data has been submitted
if (isset($_GET['hotel_id'])) {
    $user_id = $_SESSION['user_id'];
    $homeId = $_GET['hotel_id'];

    // Fetch selected home's information
    $query = "SELECT * FROM hotel WHERE hotel_id = $homeId";
    $result = $con->query($query);

    if ($result && $result->num_rows > 0) {
        $selectedHome = $result->fetch_assoc();
    } else {
        $reservationError = "Selected hotel not found.";
    }
}

// Fetch the check-in and check-out dates from the query parameters
$checkIn = isset($_GET['checkIn']) ? $_GET['checkIn'] : "";
$checkOut = isset($_GET['checkOut']) ? $_GET['checkOut'] : "";

// Check if the reservation form has been submitted
if (isset($_POST['hotel_id'], $_POST['checkIn'], $_POST['checkOut'])) {
    $homeId = $_POST['hotel_id'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $curr_date = date("Y-m-d");

    if (strtotime($checkIn) < strtotime($curr_date) || strtotime($checkOut) < strtotime($curr_date)) {
        $reservationError = "Check-in date or check-out date cannot be earlier than today's date.";
    } else {

        // Check if check-in date is greater than check-out date
        if (strtotime($checkIn) > strtotime($checkOut)) {
            $reservationError = "Check-in date cannot be greater than the check-out date.";
        } else {
            // Calculate total price based on selected hotel's price and booking duration
            $query = "SELECT price FROM hotel WHERE hotel_id = $homeId";
            $result = $con->query($query);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $price = $row['price'];
                $bookingDuration = strtotime($checkOut) - strtotime($checkIn);
                $totalPrice = ($bookingDuration / (60 * 60 * 24)) * $price;

                // Insert reservation into the database
                $insertQuery = "INSERT INTO reservations (user_id, hotel_id, check_in_date, check_out_date, total_price) 
                            VALUES ($user_id, $homeId, '$checkIn', '$checkOut', $totalPrice)";
                $insertResult = $con->query($insertQuery);

                if ($insertResult) {
                    // Successful reservation
                    $reservationSuccess = true;

                    // Update the availability_status to "not_available"
                    $updateAvailabilityQuery = "UPDATE hotel SET availability_status = 'not_available' WHERE hotel_id = $homeId";
                    $updateAvailabilityResult = $con->query($updateAvailabilityQuery);

                    if (!$updateAvailabilityResult) {
                        // Handle the update error if needed
                        $reservationError = "Error updating availability status: " . $con->error;
                    } else {
                        // Redirect to reservations.php after successful reservation
                    }
                } else {
                    $reservationError = "Error creating reservation: " . $con->error;
                }
            } else {
                $reservationError = "Error fetching hotel price: " . $con->error;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/searches.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .holiday-home {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        .home-image {
            width: 100%;
            max-width: 500px;
            border-radius: 10px;
        }

        .holiday-details {
            margin-top: 20px;
            text-align: left;
        }

        .holiday-details h2 {
            margin-bottom: 10px;
        }

        .label {
            font-weight: bold;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="date"] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .success {
            color: green;
            font-weight: bold;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
        }

        .btn-left {
            order: 1;
            background-color: red;
        }

        .btn-right {
            order: 2;
        }
    </style>
</head>

<body>


    <div class="container">
        <?php
        if ($selectedHome) {
            echo "<div class='holiday-home'>";
            echo "<img src='{$selectedHome['image_path']}' alt='{$selectedHome['name']}' class='home-image'>";
            echo "<div class='holiday-details'>";
            echo "<h2>Hotel Name: {$selectedHome['name']}</h2>";
            echo "<p class='label'>Location:</p>";
            echo "<p>{$selectedHome['location']}</p>";

            echo "<p class='label'>Description:</p>";
            echo "<p>{$selectedHome['description']}</p>";

            echo "<p class='label'>Ratings:</p>";
            echo "<p>{$selectedHome['rating']}</p>";
            echo "</div>";
            echo "</div>";

            echo "<form method='post' action='paymenthotel.php'>";
            echo "<input type='hidden' name='hotel_id' value='{$selectedHome['hotel_id']}'>";
            echo "<label for='checkIn'>Check-in Date:</label>";
            echo "<input type='date' name='checkIn' required value='$checkIn'>";
            echo "<label for='checkOut'>Check-out Date:</label>";
            echo "<input type='date' name='checkOut' required value='$checkOut'>";
            if ($reservationError) {
                echo "<p class='error'>$reservationError</p>";
            } elseif ($reservationSuccess) {
                echo "<p class='success'>Successfully Reserved!</p>";
            }
            echo "<div class='btn-container'>";
            echo "<button type='reset' class='btn btn-left'>Reset</button>"; // Reset button moved to the left
            echo "<button type='submit' class='btn btn-right'>Reserve Now</button>"; // Reserve Now button moved to the right
            echo "</div>";
            echo "</form>";
        } elseif ($reservationError) {
            echo "<p class='error'>$reservationError</p>";
        } else {
            echo "<p>No hotel selected.</p>";
        }
        ?>
    </div>

    <!-- Footer -->
    <?php include ("footer.php"); ?>
</body>

</html>