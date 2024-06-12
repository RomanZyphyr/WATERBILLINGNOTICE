<?php
// Include database connection file
include '../dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerId = $_POST['customer_id'];

    // Prepare and execute SQL query

    $stmt = $conn->prepare("SELECT customer_name,customer, add FROM customer WHERE customer_id = ?");
    $stmt->bind_param("s", $customerId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if customer data exists
    if ($result->num_rows > 0) {
        // Fetch customer data
        $customerData = $result->fetch_assoc();

        // Return customer data as JSON
        echo json_encode($customerData);
    } else {
        // Customer not found
        echo json_encode(array('error' => 'Customer not found'));
    }

    // Close database connection
    $stmt->close();
    $conn->close();
}
