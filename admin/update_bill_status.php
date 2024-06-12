<?php
// update_bill_status.php
include('../dbcon.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bill_id = $_POST['bill_id'];

    // Check the current pay_status
    $query = "SELECT pay_status FROM bill_records WHERE bill_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $bill_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['pay_status'] == 'outstanding') {
        // Update pay_status to 'paid'
        $update_query = "UPDATE bill_records SET pay_status = 'paid' WHERE bill_id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("i", $bill_id);
        if ($stmt->execute()) {
            $response = ['status' => 'success', 'message' => 'Payment status updated to paid.'];
        } else {
            $response = ['status' => 'error', 'message' => 'Failed to update payment status.'];
        }
    } else {
        $response = ['status' => 'error', 'message' => 'Bill is not Found or already Paid.'];
    }

    echo json_encode($response);
}
?>
