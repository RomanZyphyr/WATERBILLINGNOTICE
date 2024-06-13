<?php
session_start();
include '../dbcon.php'; // Ensure this file contains the database connection details

$response = ["success" => false, "message" => ""];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $upassword = password_hash($_POST['upassword'], PASSWORD_BCRYPT);

    // Check if the username already exists
    $stmt = $conn->prepare("SELECT * FROM users_acc WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $response["message"] = "Username already exists.";
        echo json_encode($response);
        $stmt->close();
        $conn->close();
        exit();
    }
    $stmt->close();

    // Insert into users_acc table
    $stmt = $conn->prepare("INSERT INTO users_acc (username, upassword, users_role) VALUES (?, ?, 'customer')");
    if (!$stmt) {
        $response["message"] = "Failed to prepare the statement.";
        echo json_encode($response);
        $conn->close();
        exit();
    }
    $stmt->bind_param("ss", $username, $upassword);
    if (!$stmt->execute()) {
        $response["message"] = "Failed to execute the statement.";
        echo json_encode($response);
        $stmt->close();
        $conn->close();
        exit();
    }
    $users_id = $stmt->insert_id;
    $stmt->close();
   


    // Store the username and users_id in session
    $_SESSION['username'] = $username;
    $_SESSION['users_id'] = $users_id;
    $_SESSION['upassword'] = $upassword;

    $response["success"] = true;
    $response["message"] = "Account created successfully.";
    echo json_encode($response);
    $conn->close();
}
?>