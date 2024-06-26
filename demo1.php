<?php
# Start output buffering
ob_start();

# database
include ("header.php");

$reservationSuccess = false;
$reservationError = "";
$selectedHome = null;
$user_id = $_SESSION['user_id'];

// Check if the form data has been submitted
if (isset($_GET['hotel_id'])) {
    $homeId = intval($_GET['hotel_id']); // Sanitize input

    // Fetch selected home's information
    $query = "SELECT * FROM hotel WHERE hotel_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $homeId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $selectedHome = $result->fetch_assoc();
    } else {
        $reservationError = "Selected hotel not found.";
    }

    $stmt->close();
}

// Fetch the check-in and check-out dates from the query parameters
$checkIn = isset($_GET['checkIn']) ? $_GET['checkIn'] : "";
$checkOut = isset($_GET['checkOut']) ? $_GET['checkOut'] : "";

// Check if the reservation form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hotel_id'], $_POST['checkIn'], $_POST['checkOut'], $_POST['total_price'])) {
    $homeId = intval($_POST['hotel_id']);
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $total_price = $_POST['total_price'];
    $curr_date = date("Y-m-d");

    if (strtotime($checkIn) < strtotime($curr_date) || strtotime($checkOut) < strtotime($curr_date)) {
        $reservationError = "Check-in date or check-out date cannot be earlier than today's date.";
    } elseif (strtotime($checkIn) > strtotime($checkOut)) {
        $reservationError = "Check-in date cannot be greater than the check-out date.";
    } else {
        $query = "SELECT price FROM hotel WHERE hotel_id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $homeId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
           
            $bookingDuration = (strtotime($checkOut) - strtotime($checkIn)) / (60 * 60 * 24);
            $totalPrice = $bookingDuration * $total_price;

            // Insert reservation
            $insertQuery = "INSERT INTO reservations (user_id, hotel_id, check_in_date, check_out_date, total_price) 
                            VALUES (?, ?, ?, ?, ?)";
            $stmt = $con->prepare($insertQuery);
            $stmt->bind_param("iissd", $user_id, $homeId, $checkIn, $checkOut, $totalPrice);
            $insertResult = $stmt->execute();

            if ($insertResult) {
                $reservationId = $stmt->insert_id;
                $reservationSuccess = true;

                // Update availability status
                $updateAvailabilityQuery = "UPDATE hotel SET availability_status = 'not_available' WHERE hotel_id = ?";
                $stmt = $con->prepare($updateAvailabilityQuery);
                $stmt->bind_param("i", $homeId);
                $updateAvailabilityResult = $stmt->execute();

                if (!$updateAvailabilityResult) {
                    $reservationError = "Error updating availability status: " . $stmt->error;
                } else {
                    ob_end_clean(); // Clear the output buffer
                    header("Location: paymenthotel.php?reservation_id=" . $reservationId);
                    exit();
                }
            } else {
                $reservationError = "Error creating reservation: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $reservationError = "Error fetching hotel price: " . $stmt->error;
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
            font-weight: bold.
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
            echo "<p class='label'>Location: {$selectedHome['location']}</p>";
           
            echo "<p class='label'>Description:</p>";
            echo "<p>{$selectedHome['description']}</p>";
            echo "<p class='label'>Ratings: {$selectedHome['rating']}</p>";
            echo "<p class='label'>Start from: <span class='text-primary'>{$selectedHome['price']} TK</span></p>";
            echo "<input type='hidden' id='price' value='{$selectedHome['price']}'>";
            echo "</div>";
            echo "</div>";

            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='hotel_id' value='{$selectedHome['hotel_id']}'>";
            echo "<label for='checkIn'>Check-in Date: <input type='date' name='checkIn' required value='$checkIn'></label>";
            echo "<label for='checkOut'>Check-out Date: <input type='date' name='checkOut' required value='$checkOut'></label>";
            echo "<label for='total_price'>
            </label>";
            
            
        
            if ($reservationError) {
                echo "<p class='error'>$reservationError</p>";
            } elseif ($reservationSuccess) {
                echo "<p class='success'>Successfully Reserved!</p>";
            }
            echo "<div class='btn-container'>";
            echo "<button type='reset' class='btn btn-left'>Reset</button>"; 
            echo "<button type='submit' class='btn btn-right'>Reserve Now</button>"; 
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