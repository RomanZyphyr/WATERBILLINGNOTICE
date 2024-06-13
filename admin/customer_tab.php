<?php
include '../dbcon.php'; // Ensure this file contains the database connection details

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST['status'];
    $query = "SELECT customer_id, customer_name, customer_email, customer_status FROM customer";
    
    if ($status != 'refresh') {
        $statusCondition = '';
        if ($status == 'ACTIVE') {
            $statusCondition = " WHERE customer_status = 'ACTIVE'";
        } elseif ($status == 'INACTIVE') {
            $statusCondition = " WHERE customer_status = 'INACTIVE'";
        } elseif ($status == 'OUT OF SERVICE') {
            $statusCondition = " WHERE customer_status = 'OUT OF SERVICE'";
        }
        $query .= $statusCondition . " ORDER BY customer_id ASC";
    } else {
        $query .= " ORDER BY customer_id ASC";
    }

    $result = $conn->query($query);
    $rows = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    foreach ($rows as $index => $row) {
        echo "<tr class='table-secondary'>";
        echo "<th scope='row'>" . ($index + 1) . "</th>";
        echo "<td>" . $row['customer_id'] . "</td>";
        echo "<td>" . $row['customer_name'] . "</td>";
        echo "<td>" . $row['customer_email'] . "</td>";
        echo "<td>" . $row['customer_status'] . "</td>";
        echo "</tr>";
    }
    
    $conn->close();
}
?>
