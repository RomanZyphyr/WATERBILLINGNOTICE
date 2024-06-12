<?php
// Include your database connection
include '../dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the customer ID from the POST data
    $customerId = $_POST['customer_id'];

    // Prepare and execute a SELECT statement to retrieve customer data
    $stmt = $conn->prepare("SELECT * FROM users_acc WHERE customer_id = ?");
    $stmt->bind_param("s", $customerId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch customer data
        $row = $result->fetch_assoc();
        // Prepare data to send back as JSON
        $response = array(
            "success" => true,
            "account_status" => $row['account_status'],
            "phone" => $row['phone'],
            "email" => $row['email']
        );
    } else {
        // No matching customer found
        $response = array("success" => false, "message" => "Customer not found.");
    }

    // Close prepared statement and database connection
    $stmt->close();
    $conn->close();

    // Return JSON response
    echo json_encode($response);
}
?>
