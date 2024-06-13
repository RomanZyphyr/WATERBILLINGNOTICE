<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    echo json_encode([]); // No customer ID found in session, return empty array
    exit();
}

include '../dbcon.php'; // Adjust the path as needed

$customer_id = $_SESSION['customer_id'];

// Fetch bill records with outstanding status for the given customer ID
$stmt = $conn->prepare("SELECT bill_id, meter_id, bill_period_begin, bill_period_end, consumption, bill_amount FROM bill_records WHERE customer_id = ? AND pay_status = 'outstanding'");
$stmt->bind_param("i", $customer_id);
$stmt->execute();
$result = $stmt->get_result();

$bills = [];
while ($row = $result->fetch_assoc()) {
    $bills[] = $row;
}

$stmt->close();
$conn->close();

echo json_encode($bills);
?>
