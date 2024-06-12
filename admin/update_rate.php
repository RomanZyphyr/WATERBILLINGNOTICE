<?php
// Start the session and include the database connection file
session_start();
include '../dbcon.php'; // Ensure this file contains the database connection details

$response = ["success" => false, "message" => ""];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rates_type = $_POST['rates_type'];
    $rates_per_cubic = $_POST['rates_per_cubic'];
    $effective_date = $_POST['effective_date'];

    // Check if the effective date is not before the current date
    $current_date = date('Y-m-d');
    if ($effective_date < $current_date) {
        $response["message"] = "The effective date cannot be before the current date.";
        echo json_encode($response);
        exit;
    }

    // Prepare and execute the SQL statement to insert the data into the bill_rates table
    $stmt = $conn->prepare("INSERT INTO bill_rates (rates_type, rates_per_cubic, effective_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $rates_type, $rates_per_cubic, $effective_date);
    if ($stmt->execute()) {
        $response["success"] = true;
        $response["message"] = "Rate information updated successfully.";
        echo json_encode($response);
    } else {
        $response["message"] = "Error: " . $stmt->error;
        echo json_encode($response);
    }
    $stmt->close();
    $conn->close();
}
?>