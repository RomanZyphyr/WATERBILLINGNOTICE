<?php
// generatebills.php
session_start();
include '../dbcon.php'; // Ensure this file contains the database connection details

if (isset($_POST['customer_id'])) {
    $customer_id = $_POST['customer_id'];
    
    // Query to get customer and meter data
    $query = "SELECT c.customer_name, m.meter_id 
              FROM customer c 
              JOIN meter_data m ON c.customer_id = m.customer_id 
              WHERE c.customer_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if any data was returned
    if ($result->num_rows > 0) {
        $customer = $result->fetch_assoc();
        echo json_encode($customer);
    } else {
        echo json_encode(array("message" => "Customer not found."));
    }
} else {
    echo json_encode(array("message" => "Customer ID is required."));
}
?>
