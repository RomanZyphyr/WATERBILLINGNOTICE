<?php
session_start();
include '../dbcon.php'; // Ensure this file contains the database connection details

$response = ["success" => false, "message" => ""];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $customer_address = $_POST['customer_address'];
    $customer_email = $_POST['customer_email'];
    $meter_install_address = $_POST['meter_install_address'];
    $meter_type = $_POST['meter_type'];
    $meter_location = $_POST['meter_location'];

    // Retrieve users_id from session
    if (!isset($_SESSION['users_id'])) {
        $response["message"] = "Session expired. Please create an account again.";
        echo json_encode($response);
        exit();
    }

    $users_id = $_SESSION['users_id'];

    // Insert into customer table
    $stmt = $conn->prepare("INSERT INTO customer (customer_name, customer_address, customer_phone, customer_email, customer_status, users_id) VALUES (?, ?, ?, ?, 'INACTIVE', ?)");
    if (!$stmt) {
        $response["message"] = "Failed to prepare the customer statement.";
        echo json_encode($response);
        $conn->close();
        exit();
    }
    $stmt->bind_param("ssssi", $customer_name, $customer_address, $customer_phone, $customer_email, $users_id);
    if (!$stmt->execute()) {
        $response["message"] = "Failed to execute the customer statement.";
        echo json_encode($response);
        $stmt->close();
        $conn->close();
        exit();
    }
    $customer_id = $stmt->insert_id;
    $stmt->close();

    // Insert into meter_data table
    $stmt = $conn->prepare("INSERT INTO meter_data (customer_id, meter_install_address, meter_type, meter_location) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        $response["message"] = "Failed to prepare the meter data statement.";
        echo json_encode($response);
        $conn->close();
        exit();
    }
    $stmt->bind_param("isss", $customer_id, $meter_install_address, $meter_type, $meter_location);
    if (!$stmt->execute()) {
        $response["message"] = "Failed to execute the meter data statement.";
        echo json_encode($response);
        $stmt->close();
        $conn->close();
        exit();
    }
    $stmt->close();

    $conn->close();

    // Clear session data
    session_unset();
    session_destroy();

    $response["success"] = true;
    $response["message"] = "Account successfully created.";
    echo json_encode($response);
}
?>
