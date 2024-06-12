<?php
// generate bills
session_start();
include('../dbcon.php'); // Assume this file contains the database connection details

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = $_POST['customer_id'];
    $meter_id = $_POST['meter_id'];
    $consumption = $_POST['consumption'];

    // Initialize bill_period_end first
    // $date=date_create("2024-05-01");
    // $bill_period_end=date_format($date,"Y/m/d");
    $bill_period_end = date('Y-m-d');
    $bill_period_begin = date('Y-m-d', strtotime('-1 month', strtotime($bill_period_end)));
    $due_date = date('Y-m-d', strtotime('+7 days', strtotime($bill_period_end)));
    $pay_status = 'outstanding';

     // Check if the customer already has a bill for the specified month of bill_period_end
     $bill_month = date('Y-m', strtotime($bill_period_end));
     $query = "SELECT COUNT(*) as count FROM bill_records WHERE customer_id = ? AND DATE_FORMAT(bill_period_end, '%Y-%m') = ?";
     $stmt = $conn->prepare($query);
     $stmt->bind_param("is", $customer_id, $bill_month);
     $stmt->execute();
     $result = $stmt->get_result();
     $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        $message = "This customer already has bills for this month.";
        echo json_encode(array("message" => $message, "status" => "error"));
        exit;
    }

    // Get the meter type for the customer
    $query = "SELECT m.meter_type 
              FROM meter_data m 
              WHERE m.meter_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $meter_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $meter_type = $result->fetch_assoc()['meter_type'];

    // Get the rate per cubic meter based on the nearest effective date not greater than bill_period_end and rate_type = meter_type
    $query = "SELECT r.rates_per_cubic 
              FROM bill_rates r 
              WHERE r.rates_type = ? AND r.effective_date <= ?
              ORDER BY r.effective_date DESC
              LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $meter_type, $bill_period_end);
    $stmt->execute();
    $result = $stmt->get_result();
    $rate = $result->fetch_assoc()['rates_per_cubic'];

    $bill_amount = $consumption * $rate;

    // Start transaction
    $conn->begin_transaction();

    try {
        // Insert billing record
        $query = "INSERT INTO bill_records (customer_id, meter_id, bill_period_begin, bill_period_end, consumption, bill_amount, due_date, pay_status) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iissddss", $customer_id, $meter_id, $bill_period_begin, $bill_period_end, $consumption, $bill_amount, $due_date, $pay_status);
        $stmt->execute();

        // Insert meter reading record
        $query = "INSERT INTO meter_reading (meter_id, reading_date_time, reading_value) 
                  VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("isd", $meter_id, $bill_period_end, $consumption);
        $stmt->execute();

        // Commit transaction
        $conn->commit();

        $message = "Billing record created successfully.";
        echo json_encode(array("message" => $message, "status" => "success"));
    } catch (Exception $e) {
        // Rollback transaction
        $conn->rollback();

        $message = "Failed to create billing record.";
        echo json_encode(array("message" => $message, "status" => "error"));
    }
}
?>
