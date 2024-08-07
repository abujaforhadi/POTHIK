<?php
ob_start();
include('header.php');

$searchError = "";
$searchResults = array();


if (isset($_GET['location'], $_GET['checkIn'], $_GET['checkOut'])) {
    $location = $_GET['location'];
    $checkIn = $_GET['checkIn'];
    $checkOut = $_GET['checkOut'];

 
    $query = "SELECT * FROM hotel WHERE location LIKE '%$location%' AND availability_status = 'available'";
    $result = $con->query($query);

    if (!$result) {
        $searchError = "Error fetching results: " . $con->error;
    } else {
        while ($row = $result->fetch_assoc()) {
            $homeId = $row['hotel_id'];
            $availabilityQuery = "SELECT COUNT(*) as count FROM reservations WHERE hotel_id = $homeId AND check_in_date <= '$checkOut' AND check_out_date >= '$checkIn'";
            $availabilityResult = $con->query($availabilityQuery);

            if ($availabilityResult) {
                $availabilityRow = $availabilityResult->fetch_assoc();
                if ($availabilityRow['count'] == 0) {
                    $searchResults[] = $row;
                }
                $availabilityResult->free();
            } else {
                $searchError = "Error checking availability: " . $con->error;
                break;
            }
        }
        $result->free();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  
    <style>
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        .holiday-home {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
            display: flex;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .home-image {
            width: 30%;
            object-fit: cover;
        }
        .holiday-details {
            padding: 20px;
            width: 70%;
        }
        .holiday-details h2 {
            margin-top: 0;
            font-size: 24px;
        }
        .label {
            font-weight: bold;
            margin: 10px 0 5px;
        }
        .buttons {
            margin-top: 20px;
        }
        .btn {
            background-color: #28a745;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        if (!empty($searchError)) {
            echo "<p class='error'>$searchError</p>";
        } elseif (!empty($searchResults)) {
            foreach ($searchResults as $row) {
                echo "<div class='holiday-home'>";
                echo "<img src='{$row['image_path']}' alt='{$row['name']}' class='home-image'>";
                echo "<div class='holiday-details'>";
                echo "<h2>{$row['name']}</h2>";
                echo "<p class='label'>Location:</p>";
                echo "<p>{$row['location']}</p>";
                
                echo "<p class='label'>Rating:</p>";
                echo "<p>{$row['rating']}</p>";
                echo "<div class='buttons'>";
                echo "<a href='reserve.php?hotel_id={$row['hotel_id']}&checkIn=$checkIn&checkOut=$checkOut' class='btn'>Book Now</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>No results found.</p>";
        }
        ?>
    </div>

    <?php 
    include("footer.php"); ?>
</body>

</html>
