<?php
session_start();
require_once('tcpdf/tcpdf.php');
require('./database/connection.php');


$user_name = $_SESSION['user_name'] ?? 'Guest';
$total_price = $_SESSION['total_price'] ?? '0';
$payment_method = $_POST['payment_method'] ?? '';
$card_number = $_POST['card_number'] ?? '';
$card_expiry = $_POST['card_expiry'] ?? '';
$card_cvc = $_POST['card_cvc'] ?? '';
$mobile_banking_number = $_POST['mobile_banking_number'] ?? '';
$transaction_id = $_POST['transaction_id'] ?? '';

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Payment Details');
$pdf->SetSubject('Payment Details');
$pdf->SetKeywords('Payment, Details, PDF');


$logo_path = 'assets/icons/pothik 2.png';
$pdf->SetHeaderData($logo_path, 30, 'Pothik', 'Money Receipt', [0, 64, 255], [0, 64, 128]);


$pdf->setFontSubsetting(true);


$pdf->AddPage();


$html = '
<style>
    h1 {
        color: #333;
        text-align: center;
        font-size: 24px;
    }
    p {
        font-size: 16px;
        margin-bottom: 10px;
    }
</style>
<h1>Payment Details</h1>
<p><strong>User Name:</strong> ' . htmlspecialchars($user_name) . '</p>
<p><strong>Total Payment Amount:</strong> ' . htmlspecialchars($total_price) . ' TK</p>
<p><strong>Payment Method:</strong> ' . htmlspecialchars($payment_method) . '</p>';

if ($payment_method === 'card') {
    $html .= '
    <p><strong>Card Number:</strong> ' . htmlspecialchars($card_number) . '</p>
    <p><strong>Expiry Date:</strong> ' . htmlspecialchars($card_expiry) .  '</p>';
} elseif ($payment_method === 'mobile_banking') {
    $html .= '
    <p><strong>Mobile Banking Number:</strong> ' . htmlspecialchars($mobile_banking_number) . '</p>
    <p><strong>Transaction ID:</strong> ' . htmlspecialchars($transaction_id) . '</p>';
}

$html .= '
<p><strong>Date:</strong> ' . date('Y-m-d H:i:s') . '</p>';

// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('payment_details.pdf', 'D'); // 'D' parameter forces download

// Exit script
header('Location: download_pdf.php');
exit();

?>
