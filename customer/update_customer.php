<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['user_role'] !== 'customer') {
    header("Location: ../index.php");
    exit();
}

include '../dbcon.php'; // Ensure this file contains the database connection details

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_SESSION['customer_id'];
    $username = $_SESSION['username'];

    $fullname = trim($_POST['fullname']);
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $new_username = trim($_POST['username']);
    $new_password = trim($_POST['password']);

    $conn->begin_transaction();

    try {
        // Update the customer table
        $stmt = $conn->prepare("UPDATE customer SET customer_name = ?, customer_address = ?, customer_phone = ?, customer_email = ? WHERE customer_id = ?");
        $stmt->bind_param("sssii", $fullname, $address, $phone, $email, $customer_id);
        $stmt->execute();
        $stmt->close();

        // Hash the new password
        $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the users_acc table
        $stmt_user = $conn->prepare("UPDATE users_acc SET username = ?, upassword = ? WHERE users_id = (SELECT users_id FROM customer WHERE customer_id = ?)");
        $stmt_user->bind_param("ssi", $new_username, $hashedPassword, $customer_id);
        $stmt_user->execute();
        $stmt_user->close();

        $_SESSION['username'] = $new_username;

        $conn->commit();

        $message = "Profile updated successfully!";
    } catch (Exception $e) {
        $conn->rollback();
        $message = "Failed to update profile: " . $e->getMessage();
    }
} else {
    $message = "Invalid request.";
}

$conn->close();

$_SESSION['message'] = $message;
header("Location: client.php");
exit();
?>
