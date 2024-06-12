<?php
// fetch_outstanding_bills.php
include('../dbcon.php');

$query = "SELECT bill_id, customer_id, bill_period_begin, bill_period_end, bill_amount, pay_status 
          FROM bill_records 
          WHERE pay_status = 'outstanding'";
$result = $conn->query($query);

$bills = [];
while ($row = $result->fetch_assoc()) {
    $bills[] = $row;
}

echo json_encode($bills);
?>
