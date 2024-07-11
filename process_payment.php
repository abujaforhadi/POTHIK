<?php
session_start();

$payment_method = $_POST['payment_method'];

$payment_success = false;

if ($payment_method === 'card') {
    $card_number = $_POST['card_number'];
    $card_expiry = $_POST['card_expiry'];
    $card_cvc = $_POST['card_cvc'];

    $payment_success = true;

} else if ($payment_method === 'mobile_banking') {
    $mobile_banking_number = $_POST['mobile_banking_number'];
    $transaction_id = $_POST['transaction_id'];

    $payment_success = true;
}

if ($payment_success) {
    echo "Payment successful!";
} else {
    echo "Payment failed!";
}
?>
