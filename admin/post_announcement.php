<?php
// post_announcement.php
session_start();
include('../dbcon.php'); // Assume this file contains the database connection details

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $affected_area = $_POST['affected_area'];
    $announcement_date = $_POST['announcement_date'];
    $announcement_time = $_POST['announcement_time'];

    // Insert data into the posts table
    $query = "INSERT INTO posts (posts_date, posts_time, posts_area) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $announcement_date, $announcement_time, $affected_area);

    if ($stmt->execute()) {
        echo json_encode(array("status" => "success", "message" => "Announcement posted successfully."));
    } else {
        echo json_encode(array("status" => "error", "message" => "Failed to post announcement."));
    }

    $stmt->close();
    $conn->close();
}
?>
