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
    <title>Passenger Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .cont {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            display: flex;
            flex-wrap: wrap;
        }

        .cont h1 {
            text-align: center;
            width: 100%;
            margin-bottom: 20px;
            color: #333;
        }

        .container_pssngr_1 {
            flex: 1;
            min-width: 300px;
            margin-right: 20px;
            color: #555;
            font-size: 18px;
            line-height: 1.6;
        }

        .container_pssngr_1 span {
            display: block;
            margin-bottom: 5px;
        }

        .bg1 {
            flex: 1;
            min-width: 300px;
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .container_pssngr_2 {
            width: 100%;
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }

        .container_pssngr_2 input[type="number"],
        .container_pssngr_2 input[type="text"],
        .container_pssngr_2 input[type="button"],
        .container_pssngr_2 input[type="submit"] {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .container_pssngr_2 input[type="button"],
        .container_pssngr_2 input[type="submit"] {
            cursor: pointer;
        }

        .container_pssngr_2 input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .container_pssngr_2 input[type="submit"]:hover {
            background-color: #218838;
        }

        .container_pssngr_2 input[type="button"]#delrw_id {
            background-color: red;
            color: white;
            border: none;
        }

        .container_pssngr_2 input[type="button"]#delrw_id:hover {
            background-color: darkred;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
    <div class="cont">
        <h1>Passenger Information</h1>
        <div class="container_pssngr_1">
            <?php
           
            $a = $_SESSION['frm'];
            $b = $_SESSION['to'];
            $c = $_SESSION['dt'];
            $h = $_POST['radio_name'];
            $e = $_POST['fair_name'];

            // Format the date to "June 6, 2024"
            $date = new DateTime($c);
            $formattedDate = $date->format('F j, Y');

            echo "<span>Going From: $a</span>";
            echo "<span>Going To: $b</span>";
            echo "<span>Journey Date: $formattedDate</span>";
            echo "<span>Bus Name: $h</span>";
            echo "<span>Ticket Price: $e</span>";
            $_SESSION["fph"] = $_POST['fair_name'];
            $_SESSION["bsnm"] = $_POST['radio_name'];
            ?>
        </div>
        <img class="bg1" src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="bus">
        <form action="payment_page.php" method="post" onsubmit="return validate()">
            <div class="container_pssngr_2">
                <label for="num_id">Number of passengers:</label>
                <input type="number" id="num_id" name="num_name" required>
                <input type="button" value="GET ROWS" id="gtrws_id" onclick="addrw()">
                <table id="t1">
                    <tr>
                        <th>SL No.</th>
                        <th>Passenger Name</th>
                        <th>Contact Number</th>
                        <th>Age</th>
                    </tr>
                </table>
                <div class="button-container">
                    <input type="button" value="DELETE ROW" id="delrw_id" onclick="delrw()">
                    <input type="submit" class="btn_pssngr" value="Go to payment details">
                </div>
            </div>
        </form>
    </div>

    <script language="javascript">
        var d, count = 1;

        function addrw() {
            d = document.getElementById("num_id").value;
            var mytab = document.getElementById("t1");
            var v;
            if (count <= d) {
                v = 1;
                while (count <= d) {
                    var r1 = mytab.insertRow();
                    var c1 = r1.insertCell();
                    var c2 = r1.insertCell();
                    var c3 = r1.insertCell();
                    var c4 = r1.insertCell();

                    c1.innerHTML = v;
                    c2.innerHTML = "<input type='text' name='col2_" + v + "' required>";
                    c3.innerHTML = "<input type='text' name='col3_" + v + "' id='col3" + v + "' required>";
                    c4.innerHTML = "<input type='text' name='col4_" + v + "' required>";
                    count++;
                    v++;
                }
            } else {
                alert("No number has been entered");
            }
            return false;
        }

        function delrw() {
            var c = document.getElementById("num_id").value;
            document.getElementById("t1").deleteRow(c);
            c = c - 1;
            document.getElementById("num_id").value = c;
        }

        function validate() {
            var i, s;
            for (i = 1; i <= d; i++) {
                s = document.getElementById("col3" + i).value;
                if (isNaN(s)) {
                    alert("Please enter a valid number");
                    return false;
                }
            }
            return true;
        }
    </script>
</body>
</html>
<?php
include ('footer.php');
?>
