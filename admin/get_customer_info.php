<?php
// fetch_customer_update.php
session_start();
include '../dbcon.php'; // Ensure this file contains the database connection details

if (isset($_POST['customer_id'])) {
    $customer_id = $_POST['customer_id'];
    
    // Query to get customer data
    $query = "SELECT c.customer_name, c.customer_phone, c.customer_address, c.customer_email, c.customer_status, u.username 
              FROM customer c 
              JOIN users_acc u ON c.users_id = u.users_id 
              WHERE c.customer_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $customer = $result->fetch_assoc();

    if ($customer) {
        echo json_encode($customer);
    } else {
        echo json_encode(array("message" => "Customer not found."));
    }
}
?>
