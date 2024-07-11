<?php
session_start();
require_once('tcpdf/tcpdf.php'); 


$passengers = $_SESSION['passengers'];
$num_passengers = $_SESSION['num_passengers'];
$total_price = $_SESSION['total_price'];
$payment_method = $_POST['payment_method'];
$card_number = $_POST['card_number'] ?? '';
$card_expiry = $_POST['card_expiry'] ?? '';
$card_cvc = $_POST['card_cvc'] ?? '';
$mobile_banking_number = $_POST['mobile_banking_number'] ?? '';
$transaction_id = $_POST['transaction_id'] ?? '';

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Pothik');
$pdf->SetTitle('Payment Receipt');
$pdf->SetSubject('Passenger Information and Payment Details');


$logo_path = 'assets/icons/pothik 2.png';
$pdf->SetHeaderData($logo_path, 30, 'Pothik', 'Money Receipt', [0, 64, 255], [0, 64, 128]);

$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);


$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);


$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


$pdf->AddPage();


$html = '
<style>
    h1 {
        color: #333;
        text-align: center;
        font-size: 24px;
    }
    h2 {
        color: #007BFF;
        text-align: center;
        font-size: 20px;
    }
    h3 {
        color: #28A745;
        font-size: 18px;
    }
    h4 {
        color: #DC3545;
        font-size: 16px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
        color: #333;
        text-align: center;
        padding: 8px;
    }
    td {
        text-align: center;
        padding: 8px;
    }
</style>
<h1>Payment Details</h1>
<h2>Total Price: ' . $total_price . 'TK</h2>
<h3>Payment Method: ' . ucfirst($payment_method) . '</h3>';

if ($payment_method == 'card') {
    $html .= '
    <h4>Card Number: ' . $card_number . '</h4>
    <h4>Expiry Date: ' . $card_expiry . '</h4>
    <h4>CVC: ' . $card_cvc . '</h4>';
} elseif ($payment_method == 'mobile_banking') {
    $html .= '
    <h4>Mobile Banking Number: ' . $mobile_banking_number . '</h4>
    <h4>Transaction ID: ' . $transaction_id . '</h4>';
}

$html .= '
<h2>Passenger Information</h2>
<table>
    <tr>
        <th>SL No.</th>
        <th>Passenger Name</th>
        <th>Contact Number</th>
        <th>Age</th>
    </tr>';

$i = 1;
foreach ($passengers as $passenger) {
    $html .= '
    <tr>
        <td>' . $i . '</td>
        <td>' . $passenger['name'] . '</td>
        <td>' . $passenger['contact'] . '</td>
        <td>' . $passenger['age'] . '</td>
    </tr>';
    $i++;
}

$html .= '</table>';
$html .= '
<p><strong>Date:</strong> ' . date('Y-m-d H:i:s') . '</p>';


$pdf->writeHTML($html, true, false, true, false, '');


$pdf->Output('payment_details.pdf', 'D'); 

header('Location: download_pdf.php');
exit();

?>
