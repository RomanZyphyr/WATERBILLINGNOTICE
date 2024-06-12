<!-- <?php
// Include your database configuration file
include '../dbcon.php';


// Get the search term from the POST request
$searchTerm = $_POST['searchTerm'];
$response = array('success' => false);

// Prepare and execute the SQL query to fetch consumer name and related details
$sql = "SELECT c.customer_name, c.customer_id, md.meter_id, md.meter_type
        FROM customer c
        LEFT JOIN meter_data md ON c.customer_id = md.customer_id
        WHERE c.customer_id = ? OR md.meter_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response['consumer_name'] = $row['customer_name'];
    $customer_id = $row['customer_id'];
    $meter_id = $row['meter_id'];
    $meter_type = $row['meter_type'];

    // Get the current date for bill_period_end
    $bill_period_end = date('Y-m-d');
    $bill_period_begin = date('Y-m-d', strtotime('-1 month', strtotime($bill_period_end)));
    $due_date = date('Y-m-d', strtotime('+7 days', strtotime($bill_period_end)));

    // Fetch the rate per cubic meter based on the meter type and the current month
    $sql_rate = "SELECT rates_per_cubic FROM bill_rates WHERE rates_type = ? AND MONTH(effective_date) = MONTH(?)";
    $stmt_rate = $conn->prepare($sql_rate);
    $stmt_rate->bind_param("ss", $meter_type, $bill_period_end);
    $stmt_rate->execute();
    $result_rate = $stmt_rate->get_result();

    if ($result_rate->num_rows > 0) {
        $row_rate = $result_rate->fetch_assoc();
        $rates_per_cubic = $row_rate['rates_per_cubic'];

        // Calculate the bill amount
        // Assuming consumption is provided through the form
        $consumption = $_POST['consumption'];
        $bill_amount = $rates_per_cubic * $consumption;

        // Prepare the response
        $response['success'] = true;
        $response['bill_period_end'] = $bill_period_end;
        $response['bill_period_begin'] = $bill_period_begin;
        $response['due_date'] = $due_date;
        $response['rates_per_cubic'] = $rates_per_cubic;
        $response['bill_amount'] = $bill_amount;
    }
}

$stmt->close();
$conn->close();

echo json_encode($response);
?> -->
