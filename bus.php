<?php
ob_start();

include ('header.php');



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
        * {
            margin: 0%;
            padding: 0%;
        }

        .containerrr {
            display: flex;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .col {
            padding: 40px;
        }

        .col img {
            max-width: 600px;
            height: 400px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form select,
        form input[type="date"],
        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        form input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #218838;
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

            margin-bottom: 25px;
            position: relative;
            top: -58px;
            background-color: white;
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
    <div class="containerrr">
        <div class="col">
            <form action="" method="post">
                <label for="src_id">Going From:</label>
                <select name="src_name" id="src_id">
                    <option>Select</option>
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
                </select>

                <label for="to_id">Going To:</label>
                <select name="to_name" id="to_id">
                    <option>Select</option>
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
                </select>

                <label>Journey Date:</label>
                <input name="date_name" type="date" id="date_id" required>

                <input name="submit" type="submit" value="GET DETAILS" class="submit">
            </form>
        </div>
        <div class="col">
            <img src="assets/img/bus.jpg" alt="Banner">
        </div>
    </div>

    <br><br>
    <form action="passenger info.php" method="post" class="secondform">
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
                print ('<table style="border: 2px solid blue;">
    <tr>
        <th>BUS NAME</th>
        <th>FARE</th>
        <th>VACANT SEATS</th>
        <th>SELECT</th>
    </tr>');

                while ($row = mysqli_fetch_row($result)) {
                    print ('<tr>
        <td>' . $row[0] . '</td>
        <td align="center"><input type="hidden" value="' . $row[3] . '" name="fair_name">' . $row[3] . '</td>
        <td align="center">' . $row[4] . '</td>
        <td align="center"><input type="radio" name="radio_name" value="' . $row[0] . '"></td>
    </tr> ');
                }
                print ('</table>');
            }
        }
        ?>
        <br><br>
        <!-- <form action="passenger info.php" method="post"> -->
        <input type="submit" value="Submit" class="lastbutton">
        <!-- </form> -->
    </form>
</body>
<script type="text/javascript">
    var array = ["01-10-2024", "01-12-2024"];

    $("input").datepicker({
        beforeShowDay: function (date) {
            var string = jQuery.datepicker.formatDate('mm-dd-yy', date);
            return [array.indexOf(string) == -1]
        }
    });
</script>

</html>

<?php

include ('./footer.php');
?>