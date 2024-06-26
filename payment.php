<?php

 include ('header.php');
$user_data = check_login($con);

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

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
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

        .form-container {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select, input[type="text"], input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            cursor: pointer;
            background-color: #28a745;
            color: white;
            border: none;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        #card_payment, #mobile_banking_payment {
            display: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
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
        <p><strong>User Name:</strong> <span><?php echo htmlspecialchars(ucfirst($user_name)); ?></span></p>
        <p><strong>Total Price:</strong> <span><?php echo htmlspecialchars($total_price); ?> TK</span></p>
    </div>

    <div class="form-container">
        <form id="payment_form" action="gene_pdf.php" method="post">
            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="">Select</option>
                <option value="card">Credit/Debit Card</option>
                <option value="mobile_banking">Mobile Banking</option>
            </select>

            <div id="card_payment">
                <label for="card_number">Card Number:</label>
                <input type="text" id="card_number" name="card_number">
                <label for="card_expiry">Expiry Date (MM/YY):</label>
                <input type="text" id="card_expiry" name="card_expiry">
                <label for="card_cvc">CVC:</label>
                <input type="text" id="card_cvc" name="card_cvc">
            </div>

            <div id="mobile_banking_payment">
                <label for="mobile_banking_number">Mobile Banking Number:</label>
                <input type="text" id="mobile_banking_number" name="mobile_banking_number">
                <label for="transaction_id">Transaction ID:</label>
                <input type="text" id="transaction_id" name="transaction_id">
            </div>

            <input type="submit" value="Make Payment">
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const paymentMethodSelect = document.getElementById('payment_method');
        const cardPaymentDiv = document.getElementById('card_payment');
        const mobileBankingDiv = document.getElementById('mobile_banking_payment');

        paymentMethodSelect.addEventListener('change', function () {
            if (this.value === 'card') {
                cardPaymentDiv.style.display = 'block';
                mobileBankingDiv.style.display = 'none';
            } else if (this.value === 'mobile_banking') {
                cardPaymentDiv.style.display = 'none';
                mobileBankingDiv.style.display = 'block';
            } else {
                cardPaymentDiv.style.display = 'none';
                mobileBankingDiv.style.display = 'none';
            }
        });

        document.getElementById('payment_form').addEventListener('submit', function (event) {
            event.preventDefault();
            alert("Payment is being processed. Please wait...");
            setTimeout(function () {
                document.getElementById('payment_form').submit(); // Submit the form to gene_pdf.php
            }, 1000); // Adjust delay as needed
        });
    });
</script>

</body>
</html>
