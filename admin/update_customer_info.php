<?php
// update_customer.php
session_start();
include '../dbcon.php'; // Ensure this file contains the database connection details

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['customer_id'];
    $username = $_POST['username'];
    $upassword = $_POST['upassword'];
    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $customer_address = $_POST['customer_address'];
    $customer_email = $_POST['customer_email'];
    $customer_status = $_POST['customer_status'];

    // Check if the customer exists
    $query = "SELECT users_id FROM customer WHERE customer_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $customer = $result->fetch_assoc();

    if ($customer) {
        $users_id = $customer['users_id'];

        // Update users_acc table
        if ($upassword != '') {
            $hashed_password = password_hash($upassword, PASSWORD_BCRYPT);
            $query = "UPDATE users_acc SET username = ?, upassword = ? WHERE users_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssi", $username, $hashed_password, $users_id);
        } else {
            $query = "UPDATE users_acc SET username = ? WHERE users_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("si", $username, $users_id);
        }
        $stmt->execute();

        // Update customer table
        $query = "UPDATE customer SET customer_name = ?, customer_phone = ?, customer_address = ?, customer_email = ?, customer_status = ? WHERE customer_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssi", $customer_name, $customer_phone, $customer_address, $customer_email, $customer_status, $customer_id);
        $stmt->execute();

        echo json_encode(array("message" => "Customer information updated successfully."));
    } else {
        echo json_encode(array("message" => "Customer not found."));
    }
}
?>
