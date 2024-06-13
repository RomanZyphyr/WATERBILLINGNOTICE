<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    die('No customer ID found in session.');
}

include '../dbcon.php'; // Adjust the path as needed
require('../fpdf186/fpdf.php'); // Adjust the path as needed

$customer_id = $_SESSION['customer_id'];

// Fetch bill records with outstanding status for the given customer ID
$stmt = $conn->prepare("SELECT bill_id, meter_id, bill_period_begin, bill_period_end, consumption, bill_amount FROM bill_records WHERE customer_id = ? AND pay_status = 'outstanding'");
$stmt->bind_param("i", $customer_id);
$stmt->execute();
$result = $stmt->get_result();

$bill = $result->fetch_assoc();

if (!$bill) {
    die('No outstanding bills found.');
}

$stmt->close();
$conn->close();

class PDF extends FPDF
{
    function Header()
    {
        // Add a dashed line below the header
        $this->SetLineWidth(0.1);
        $this->SetDash(1, 1); // Set dashed border
        $this->Cell(0, 0, '', 'D', 1, 'C');
    }

    function SetDash($black = null, $white = null)
    {
        if ($black !== null) {
            $s = sprintf('[%.3F %.3F] 0 d', $black * $this->k, $white * $this->k);
        } else {
            $s = '[] 0 d';
        }
        $this->_out($s);
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Title
$pdf->Cell(0, 10, 'Bill Details', 0, 1, 'C');

// Bill Details
$pdf->SetFont('Arial', '', 12);

// Centering the text with bordered broken line
$cellWidth = 0;
$pdf->SetDash(1, 1); // Set dashed border
$pdf->Cell($cellWidth, 10, 'Bill ID: ' . $bill['bill_id'], 'D', 1, 'C');
$pdf->Cell($cellWidth, 10, 'Meter ID: ' . $bill['meter_id'], 'D', 1, 'C');
$pdf->Cell($cellWidth, 10, 'Billing Date From: ' . $bill['bill_period_begin'], 'D', 1, 'C');
$pdf->Cell($cellWidth, 10, 'Billing Date To: ' . $bill['bill_period_end'], 'D', 1, 'C');
$pdf->Cell($cellWidth, 10, 'Water Consumption: ' . $bill['consumption'], 'D', 1, 'C');
$pdf->Cell($cellWidth, 10, 'Billing Amount: ' . $bill['bill_amount'], 'D', 1, 'C');

$pdf->Output('D', 'bill_' . $bill['bill_id'] . '.pdf');
?>
