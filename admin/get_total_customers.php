<?php
// get_total_customers.php
session_start();
include('../dbcon.php'); // Assume this file contains the database connection details

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Query to count total customers
    $query = "SELECT COUNT(*) as total_customers FROM customer";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $total_customers = $result->fetch_assoc()['total_customers'];

    // Return the total customers as JSON
    echo json_encode(array("total_customers" => $total_customers));
}
?>
