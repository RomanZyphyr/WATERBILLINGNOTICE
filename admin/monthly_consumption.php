<?php
// get_monthly_consumption.php
session_start();
include('../dbcon.php'); // Assume this file contains the database connection details

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Get the current month and previous month
    $current_month = date('Y-m');
    $previous_month = date('Y-m', strtotime('-1 month'));

    // Query to get the total reading_value for the current month
    $query_current = "SELECT SUM(reading_value) as total_current FROM meter_reading WHERE DATE_FORMAT(reading_date_time, '%Y-%m') = ?";
    $stmt_current = $conn->prepare($query_current);
    $stmt_current->bind_param("s", $current_month);
    $stmt_current->execute();
    $result_current = $stmt_current->get_result();
    $total_current = $result_current->fetch_assoc()['total_current'];

    // Query to get the total reading_value for the previous month
    $query_previous = "SELECT SUM(reading_value) as total_previous FROM meter_reading WHERE DATE_FORMAT(reading_date_time, '%Y-%m') = ?";
    $stmt_previous = $conn->prepare($query_previous);
    $stmt_previous->bind_param("s", $previous_month);
    $stmt_previous->execute();
    $result_previous = $stmt_previous->get_result();
    $total_previous = $result_previous->fetch_assoc()['total_previous'];

    // Return the totals as JSON
    echo json_encode(array("total_current" => $total_current, "total_previous" => $total_previous));
}
?>
