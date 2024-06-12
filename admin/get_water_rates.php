
<?php

include('../dbcon.php');

$year = isset($_GET['year']) ? (int)$_GET['year'] : 2020;

// Ensure the year is within the valid range
if ($year < 2020 || $year > 2025) {
    $year = 2024;
}

$query = "SELECT rates_type, MAX(rates_per_cubic) AS max_rate, DATE_FORMAT(effective_date, '%m') AS month 
          FROM bill_rates 
          WHERE YEAR(effective_date) = ? 
          GROUP BY rates_type, DATE_FORMAT(effective_date, '%m')
          ORDER BY effective_date";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $year);
$stmt->execute();
$result = $stmt->get_result();

$commercial = array_fill(0, 12, 0);
$residential = array_fill(0, 12, 0);

while ($row = $result->fetch_assoc()) {
    $month = (int)$row['month'] - 1; // Month is 0-indexed in the array
    if ($row['rates_type'] == 'commercial') {
        $commercial[$month] = (float)$row['max_rate'];
    } else if ($row['rates_type'] == 'residential') {
        $residential[$month] = (float)$row['max_rate'];
    }
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode([
    'commercial' => $commercial,
    'residential' => $residential
]);
?>