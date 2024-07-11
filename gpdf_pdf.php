<?php
require_once('tcpdf/tcpdf.php');
require_once('database/connection.php');

ob_start(); // Start output buffering

if (isset($_POST['reservation_id'])) {
    $reservationId = intval($_POST['reservation_id']); // Sanitize input

    // Fetch reservation details (assuming $con is your database connection)
    $query = "SELECT 
    reservations.*, 
    hotel.name, 
    hotel.price,
    users.user_name
FROM 
    reservations
JOIN 
    hotel 
ON 
    reservations.hotel_id = hotel.hotel_id
JOIN 
    users 
ON 
    reservations.user_id = users.user_id
WHERE 
    reservations.reservation_id = ?;";
    
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $reservationId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $reservation = $result->fetch_assoc();
        $hotelName = $reservation['name'];
        $totalPrice = $reservation['total_price']; // Ensure correct field is used
        $checkIn = $reservation['check_in_date'];
        $checkOut = $reservation['check_out_date'];
        $user_name = $reservation['user_name'];

        // Create new PDF document
        $pdf = new TCPDF();
        
        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Company');
        $pdf->SetTitle('Payment Receipt');
        $pdf->SetSubject('Payment Receipt');
        $pdf->SetKeywords('TCPDF, PDF, payment, receipt');

        // Set header data
        $logo_path = 'assets/icons/pothik 2.png';
        $pdf->SetHeaderData($logo_path, 30, 'Pothik', 'Money Receipt', [0, 64, 255], [0, 64, 128]);

        // Add a page
        $pdf->AddPage();
        
        // Set some content to print
        $html = "
        <h1 >Payment Receipt</h1>
        <p><b>Customer Name:</b> $user_name</p>
        <p><b>Hotel Name:</b> $hotelName</p>
        <p><b>Check-in Date:</b> $checkIn</p>
        <p><b>Check-out Date:</b> $checkOut</p>
        <p><b>Total Price:</b> $totalPrice tk</p>
        ";
        $html .= '
<p><strong>Date:</strong> ' . date('Y-m-d H:i:s') . '</p>';
        
        // Print text using writeHTMLCell()
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // Close and output PDF document
        ob_end_clean(); // Clean the output buffer to prevent any previous output
        $pdf->Output('payment_receipt.pdf', 'D');
    } else {
        ob_end_clean(); // Clean the output buffer
        echo "Reservation not found.";
    }

    $stmt->close();
} else {
    ob_end_clean(); // Clean the output buffer
    echo "Invalid request.";
}
header('Location: download_pdf.php');
exit();

?>
