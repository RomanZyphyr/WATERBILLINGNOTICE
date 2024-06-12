<?php
// get_pending_payments.php
session_start();
include('../dbcon.php'); // Assume this file contains the database connection details

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Get the current year and month
    $current_year_month = date('Y-m');

    // Query to count the total number of outstanding payments for the current month
    $query = "SELECT COUNT(*) as total_outstanding, MAX(due_date) as latest_due_date 
              FROM bill_records 
              WHERE pay_status = 'outstanding' AND DATE_FORMAT(due_date, '%Y-%m') = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $current_year_month);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Return the total outstanding payments and latest due date as JSON
    echo json_encode(array(
        "total_outstanding" => $row['total_outstanding'],
        "latest_due_date" => $row['latest_due_date']
    ));
}
?>
