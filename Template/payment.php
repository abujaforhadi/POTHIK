<?php
include ('header.php');

// Retrieve the tour_id and quantity from the URL
$tour_id = $_GET['tour_id'];
$qty = $_GET['qty'];

// Retrieve tour details based on tour_id
$item = array_filter($product->getData(), function($item) use ($tour_id) {
    return $item['tour_id'] == $tour_id;
})[0];

$tour_name = $item['tour_name'];
$tour_price = $item['tour_price'];
$total_price = $tour_price * $qty;

$_SESSION['total_price'] = $total_price;
$_SESSION['tour_name'] = $tour_name;
$_SESSION['tour_price'] = $tour_price;
$_SESSION['qty'] = $qty;
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

        .container h1, .container h2 {
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
</head>

<body>
    <div class="container">
        <h1>Payment Details</h1>
        <h2>Total Price: ৳<?php echo $total_price; ?></h2>
        <form id="payment_form" action="process_payment.php" method="post">
            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="card">Credit/Debit Card</option>
                <option value="mobile_banking">Mobile Banking</option>
            </select>

            <div id="card_payment" style="display: none;">
                <label for="card_number">Card Number:</label>
                <input type="text" id="card_number" name="card_number">
                <label for="card_expiry">Expiry Date (MM/YY):</label>
                <input type="text" id="card_expiry" name="card_expiry">
                <label for="card_cvc">CVC:</label>
                <input type="text" id="card_cvc" name="card_cvc">
            </div>

            <div id="mobile_banking_payment" style="display: none;">
                <label for="mobile_banking_number">Mobile Banking Number:</label>
                <input type="text" id="mobile_banking_number" name="mobile_banking_number">
                <label for="transaction_id">Transaction ID:</label>
                <input type="text" id="transaction_id" name="transaction_id">
            </div>

            <input type="submit" value="Make Payment">
        </form>

        <h2>Tour Information</h2>
        <table>
            <tr>
                <th>Tour Name</th>
                <th>Quantity</th>
                <th>Price per Person</th>
                <th>Total Price</th>
            </tr>
            <tr>
                <td><?php echo $tour_name; ?></td>
                <td><?php echo $qty; ?></td>
                <td>৳<?php echo $tour_price; ?></td>
                <td>৳<?php echo $total_price; ?></td>
            </tr>
        </table>
    </div>
    <script>
        document.getElementById('payment_method').addEventListener('change', function () {
            var paymentMethod = this.value;
            document.getElementById('card_payment').style.display = paymentMethod === 'card' ? 'block' : 'none';
            document.getElementById('mobile_banking_payment').style.display = paymentMethod === 'mobile_banking' ? 'block' : 'none';
        });

        document.getElementById('payment_form').addEventListener('submit', function(event) {
            event.preventDefault();
            alert("Payment is being processed. Please wait...");
            setTimeout(function() {
                window.location.href = 'index.php';
            }, 5000);
        });
    </script>
</body>
</html>
<?php
include ('footer.php');
?>
