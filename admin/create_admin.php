<?php
session_start();
include '../dbcon.php';

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $newPassword = $_POST['uPassword'];
    $confirmPassword = $_POST['cPassword'];

    // Check if passwords match
    if ($newPassword !== $confirmPassword) {
        $response['error'] = "Passwords do not match.";
    } else {
        // Check if username already exists
        $stmt = $conn->prepare("SELECT * FROM users_acc WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $response['error'] = "Username already exists.";
        } else {
            // Hash the password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Insert into users_acc table
            $stmt = $conn->prepare("INSERT INTO users_acc (username, upassword, users_role) VALUES (?, ?, 'admin')");
            $stmt->bind_param("ss", $username, $hashedPassword);

            if ($stmt->execute()) {
                $response['success'] = "Administrator account created successfully.";
            } else {
                $response['error'] = "Error: " . $stmt->error;
            }
        }
        $stmt->close();
    }
    echo json_encode($response);
}
?>
