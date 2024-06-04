<?php

include ('header.php');
// Fetch data from URL parameters
$tour_id = $_GET['tour_id'] ?? '';
$persons = $_GET['persons'] ?? '';
$total_price = $_GET['total_price'] ?? '';

// Assuming you have a mechanism to retrieve user information, such as from session or database
$user_name = $user_data['user_name']; // Replace this with the user's name fetched from session or database
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 28px;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .details {
            border-top: 1px solid #ddd;
            padding-top: 15px;
            margin-top: 15px;
        }

        .details p {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .details p:last-child {
            border-bottom: none;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #218838;
        }
    </style>
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
        <h2>Payment Details</h2>

        <div class="details">
            <p><strong>User Name:</strong> <span><?php echo ucfirst($user_name); ?></span></p>
            <p><strong>Total Price:</strong> <span>৳<?php echo $total_price; ?></span></p>
            <p><strong>Number of Persons:</strong> <span><?php echo $persons; ?></span></p>
        </div>
        <form id="payment_form" action="process_payment.php" method="post">
            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method" required>
                <option>select</option>
                <option value="card">Credit/Debit Card</option>

                <option value="mobile_banking">Mobile Banking</option>
            </select>

            <div id="card_payment" style="display: none;">
                <label for="card_number">Card Number:</label>
                <input type="text" id="card_number" name="card_number"> <br>
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
    </div>
</body>
<script>
    document.getElementById('payment_method').addEventListener('change', function () {
        var paymentMethod = this.value;
        document.getElementById('card_payment').style.display = paymentMethod === 'card' ? 'block' : 'none';
        document.getElementById('mobile_banking_payment').style.display = paymentMethod === 'mobile_banking' ? 'block' : 'none';
    });

    document.getElementById('payment_form').addEventListener('submit', function (event) {
        event.preventDefault();
        alert("Payment is being processed. Please wait...");
        setTimeout(function () {
            window.location.href = 'index.php';
        }, 5000);
    });
</script>

</html>