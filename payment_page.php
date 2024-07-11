<?php

include ('header.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $num_passengers = $_POST['num_name'];

    
    $passengers = [];
    for ($i = 1; $i <= $num_passengers; $i++) {
        $passengers[] = [
            'name' => $_POST["col2_$i"],
            'contact' => $_POST["col3_$i"],
            'age' => $_POST["col4_$i"]
        ];
    }

   
    $_SESSION['passengers'] = $passengers;
    $_SESSION['num_passengers'] = $num_passengers;
}


$ticket_price = $_SESSION["fph"];
$total_price = $ticket_price * $_SESSION['num_passengers'];
$_SESSION['total_price'] = $total_price;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .container h1,
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .container form {
            display: flex;
            flex-direction: column;
        }

        .container form input[type="text"],
        .container form input[type="number"],
        .container form input[type="submit"],
        .container form select {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .container form input[type="submit"] {
            cursor: pointer;
            background-color: #28a745;
            color: white;
            border: none;
        }

        .container form input[type="submit"]:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Payment Details</h1> 
        <h2>Total Price: <?php echo $total_price; ?>TK</h2>
        <form id="payment_form" action="generate_pdf.php" method="post">
            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="" disabled selected>Select</option>
                <option value="card">Credit/Debit Card</option>
                <option value="mobile_banking">Mobile Banking</option>
            </select>

            <div id="card_payment" style="display: none;">
                <label for="card_number">Card Number:</label>
                <input type="number" id="card_number" name="card_number">
                <label for="card_expiry">Expiry Date (MM/YY):</label>
                <input type="text" id="card_expiry" name="card_expiry">
                <label for="card_cvc">CVC:</label>
                <input type="number" id="card_cvc" name="card_cvc">
            </div>

            <div id="mobile_banking_payment" style="display: none;">
                <label for="mobile_banking_number">Mobile Banking Number:</label>
                <input type="number" id="mobile_banking_number" name="mobile_banking_number">
                <label for="transaction_id">Transaction ID:</label>
                <input type="text" id="transaction_id" name="transaction_id">
            </div>

            <input type="submit" value="Make Payment">
        </form>

        <h2>Passenger Information</h2>
        <table>
            <tr>
                <th>SL No.</th>
                <th>Passenger Name</th>
                <th>Contact Number</th>
                <th>Age</th>
            </tr>
            <?php
            $i = 1;
            foreach ($_SESSION['passengers'] as $passenger) {
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>{$passenger['name']}</td>";
                echo "<td>{$passenger['contact']}</td>";
                echo "<td>{$passenger['age']}</td>";
                echo "</tr>";
                $i++;
            }
            ?>
        </table>
    </div>
    <script>
        document.getElementById('payment_method').addEventListener('change', function () {
            var paymentMethod = this.value;
            document.getElementById('card_payment').style.display = paymentMethod === 'card' ? 'block' : 'none';
            document.getElementById('mobile_banking_payment').style.display = paymentMethod === 'mobile_banking' ? 'block' : 'none';
        });
    </script>
</body>

</html>
<?php
include ('footer.php');
?>
