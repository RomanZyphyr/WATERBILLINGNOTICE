<?php
session_start();
include 'dbcon.php'; // Ensure this file contains the database connection details

$response = ['success' => false, 'message' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['upassword'];

    // Check if the username exists
    $stmt = $conn->prepare("SELECT users_id, upassword, users_role FROM users_acc WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashedPassword, $userRole);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['users_role'] = $userRole;

            // If user is a customer, get the customer_id
            if ($userRole === 'customer') {
                $stmt_customer = $conn->prepare("SELECT customer_id FROM customer WHERE users_id = ?");
                $stmt_customer->bind_param("i", $user_id);
                $stmt_customer->execute();
                $stmt_customer->bind_result($customer_id);
                $stmt_customer->fetch();
                $stmt_customer->close();

                $_SESSION['customer_id'] = $customer_id;
            }

            $response['success'] = true;
            $response['users_role'] = $userRole;
        } else {
            $response['message'] = 'Incorrect password.';
        }
    } else {
        $response['message'] = 'Username does not exist.';
    }

    $stmt->close();
} else {
    $response['message'] = 'Invalid request.';
}

$conn->close();
echo json_encode($response);
?>
