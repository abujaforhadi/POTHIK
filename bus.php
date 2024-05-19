
<?php
ob_start();

include('header.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="http://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <style>
        body{
            min-height: 100vh;    
            background-size: cover;
            background-position: center;
        }
        h1 {
            background-color: black;
            opacity: 0.6;
            height: 105px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            width: 100vw;
            color: wheat;
        }

        * {
            margin: 0%;
            padding: 0%;
        }

        .firstform {
            padding: 25px;
            width: max-content;
            margin: 100px auto;
            font-size: 20px;
            border: 1px solid gray;
            color: black;
            border-radius: 10px;


        }

        #src_id {
            padding: 10px;
            font-size: 16px;
            width: -webkit-fill-available;
            margin-bottom: 25px;
        }

        #to_id {
            padding: 10px;
            font-size: 16px;
            width: -webkit-fill-available;
            margin-bottom: 25px;
        }

        #date_id {
            padding: 10px;
            font-size: 16px;
            width: -webkit-fill-available;
            margin-bottom: 25px;
            font-family: auto;
        }

        .submit {
            padding: 10px;
            background-color: #666666;
            border: none;
            color: white;
            font-size: 17px;
            cursor: pointer;
            border-radius: 3px;
        }

        input[type="submit"]:hover {
            background-color: black;
            color: wheat;
        }

        .secondform {
            padding: 25px;
            width: max-content;
            margin: auto;
            font-size: 20px;
            border: 1px solid gray;
            margin-bottom: 25px;
            position: relative;
            top: -58px;
            background-color: white;
            border-radius: 10px;

        }

        th {
            padding: 5px;
            border: none;
        }

        td {
            padding: 5px;
            border: none;
        }

        .lastbutton {
            margin: auto;
            display: block;
            padding: 11px;
            font-size: 19px;
            background-color: #666666;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 3px;
        }
    </style>
</head>




<body>
    <center>
        <h1>Ticket Reservations</h1>
    </center>
    <div class="left">
    <form action="" method="post" class="firstform">
From: <select name="src_name" id="src_id">
    <option value="Dhaka">Dhaka</option>
    <option value="Bogura">Bogura</option>
    <option value="CoxsBazar">Cox's Bazar</option>
    <option value="Chittagong">Chittagong</option>
    <option value="Sylhet">Sylhet</option>
    <option value="Rangpur">Rangpur</option>
    <option value="Rajshahi">Rajshahi</option>
    <option value="Rangamati">Rangamati</option>
    <option value="Khagrachari">Khagrachari</option>
    <option value="Khulna">Khulna</option>

</select><br>
To: <select name="to_name" id="to_id">
    <option value="Dhaka">Dhaka</option>
    <option value="CoxsBazar" select>Cox's Bazar</option>
    <option value="Chittagong">Chittagong</option>
    <option value="Sylhet">Sylhet</option>
    <option value="Rangpur">Rangpur</option>
    <option value="Bogura">Bogura</option>
    <option value="Rajshahi">Rajshahi</option>
    <option value="Rangamati">Rangamati</option>
    <option value="Khagrachari">Khagrachari</option>
    <option value="Khulna">Khulna</option>

</select><br><br>
Date of journey: <input type="date" name="date_name" id="date_id" required>
<br><br>


<input name="submit" type="submit" value="GET DETAILS" class="submit">
</div>

</form>



<br><br>
<form action="passenger info.php" method="post" class="secondform" >
<?php
if (isset($_POST['submit'])) {
    $frm = $_POST['src_name'];
    $to = $_POST['to_name'];

    $_SESSION["frm"] = $_POST['src_name'];
    $_SESSION["to"] = $_POST['to_name'];
    $_SESSION["dt"] = $_POST['date_name'];

    $db = mysqli_connect('localhost', 'root', '', 'travel') or die("Could not connect to Database");

    $querry = "SELECT * FROM bus_details WHERE source='$frm' AND destination='$to'";


    if ($result = mysqli_query($db, $querry) or die("Could not execute querry")) {
        print('<table style="border: 2px solid blue;">
<tr>
<th>BUS NAME</th>
<th>FARE</th>
<th>VACANT SEATS</th>
<th>SELECT</th>
</tr>');

        while ($row = mysqli_fetch_row($result)) {
            print('<tr>
<td>' . $row[0] . '</td>
<td align="center"><input type="hidden" value="' . $row[3] . '" name="fair_name">' . $row[3] . '</td>
<td align="center">' . $row[4] . '</td>
<td align="center"><input type="radio" name="radio_name" value="' . $row[0] . '"></td>
</tr> ');
        }
        print('</table>');
    }
}
?>
<br><br>
<!-- <form action="passenger info.php" method="post"> -->
<input type="submit" value="Submit" class="lastbutton">
<!-- </form> -->
</form>
    </div>
    <div class="right">
        <img src="assets/background.jpg" alt="bus" style="width: 50%; height: 50%;">


    </div>


    
</body>


</html>

<?php
include ('footer.php');
?>
