<?php
session_start();
include '../dbcon.php'; // Ensure this file contains the database connection details

$response = ["success" => false, "message" => ""];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if new password and confirm password match
    if ($newPassword !== $confirmPassword) {
        $response["message"] = "New password and confirm password do not match.";
        echo json_encode($response);
        exit;
    }

    // Check if the new password is at least 8 characters long
    if (strlen($newPassword) < 8) {
        $response["message"] = "New password must be at least 8 characters long.";
        echo json_encode($response);
        exit;
    }

    // Check if user exists and the current password is correct
    $stmt = $conn->prepare("SELECT upassword, users_role FROM users_acc WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashedPassword, $users_role);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($currentPassword, $hashedPassword) && $users_role === 'admin') {
        // Hash the new password
        $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the password in the database
        $stmt = $conn->prepare("UPDATE users_acc SET upassword = ? WHERE username = ?");
        $stmt->bind_param("ss", $newHashedPassword, $username);
        if ($stmt->execute()) {
            $response["success"] = true;
            $response["message"] = "Password changed successfully.";
        } else {
            $response["message"] = "Failed to change the password. Please try again.";
        }
        $stmt->close();
    } else {
        $response["message"] = "Invalid username, password, or this account is for customer.";
    }

    $conn->close();
} else {
    $response["message"] = "Invalid request method.";
}

echo json_encode($response);
?>
