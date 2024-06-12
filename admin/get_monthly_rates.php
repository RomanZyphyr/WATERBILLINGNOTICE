<?php
// get_monthly_rates.php
session_start();
include('../dbcon.php'); // Assume this file contains the database connection details

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Get the current month and previous month
    $current_month = date('Y-m');
    $previous_month = date('Y-m', strtotime('-1 month'));

    // Query to get the latest rates for the current month
    $query_current = "SELECT rates_type, rates_per_cubic FROM bill_rates 
                      WHERE effective_date <= CURDATE() 
                      ORDER BY effective_date DESC";
    $stmt_current = $conn->prepare($query_current);
    $stmt_current->execute();
    $result_current = $stmt_current->get_result();
    $rates_current = [];
    while ($row = $result_current->fetch_assoc()) {
        if (!isset($rates_current[$row['rates_type']])) {
            $rates_current[$row['rates_type']] = $row['rates_per_cubic'];
        }
    }

    // Query to get the latest rates for the previous month
    $query_previous = "SELECT rates_type, rates_per_cubic FROM bill_rates 
                       WHERE effective_date <= LAST_DAY(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))
                       ORDER BY effective_date DESC";
    $stmt_previous = $conn->prepare($query_previous);
    $stmt_previous->execute();
    $result_previous = $stmt_previous->get_result();
    $rates_previous = [];
    while ($row = $result_previous->fetch_assoc()) {
        if (!isset($rates_previous[$row['rates_type']])) {
            $rates_previous[$row['rates_type']] = $row['rates_per_cubic'];
        }
    }

    // Return the rates as JSON
    echo json_encode(array("rates_current" => $rates_current, "rates_previous" => $rates_previous));
}
?>
