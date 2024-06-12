<?php
include('../dbcon.php'); // Assume this file contains the database connection details

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bill_id = $_POST['bill_id'];

    // Check if the bill is outstanding
    $query = "SELECT pay_status FROM bill_records WHERE bill_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $bill_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $bill = $result->fetch_assoc();

    if ($bill) {
        echo json_encode(['status' => $bill['pay_status']]);
    } else {
        echo json_encode(['status' => 'not_found']);
    }
}
?>
