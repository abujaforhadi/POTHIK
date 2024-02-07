
    
<?php
ob_start();

include('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 
    <link rel="stylesheet" href="assets/css/index.css">
    <style type="text/css">
        .containe
{
  margin: 0;
  word-wrap: break-word;
}
body {
    min-height: 100vh;
    background: url(https://digital.ihg.com/is/image/ihg/intercontinental-dhaka-6829083857-4x3) ;
    background-size: cover;
    background-position: center;
}
</style>



    <script>
        function validateDates() {
            const checkInDate = new Date(document.forms["searchForm"]["checkIn"].value);
            const checkOutDate = new Date(document.forms["searchForm"]["checkOut"].value);

            if (checkInDate > checkOutDate) {
                alert("Check-in date cannot be greater than the check-out date.");
                return false;
            }

            return true;
        }
    </script>
</head>


<div class="containe">
        <form name="searchForm" action="users/search.php" method="GET" class="form" onsubmit="return validateDates();">
            <label>Location:</label>
            <input type="text" name="location" placeholder="Your Location" required>
            <label>Check-In:</label>
            <input type="date" name="checkIn" required>
            <label>Check-Out:</label>
            <input type="date" name="checkOut" required>

            <button type="submit" name="search" class="btn btn-success">Search</button>
            <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        </form>
 </div>


<?php

include('./footer.php');
?>
