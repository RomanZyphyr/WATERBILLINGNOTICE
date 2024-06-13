<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    echo json_encode(array("hasBill" => false)); // No customer ID found in session, assume no bill records
    exit();
}

include '../dbcon.php'; // Adjust the path as needed

$customer_id = $_SESSION['customer_id'];

// Check if there are bill records for the current month for the given customer ID
$stmt = $conn->prepare("SELECT COUNT(*) FROM bill_records WHERE customer_id = ? AND MONTH(bill_period_end) = MONTH(CURDATE()) AND YEAR(bill_period_end) = YEAR(CURDATE())");
$stmt->bind_param("i", $customer_id);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

$conn->close();

echo json_encode(array("hasBill" => ($count > 0)));
?>
