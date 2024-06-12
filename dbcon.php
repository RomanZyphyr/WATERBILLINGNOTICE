<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aquabill";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
// instead of only display by echo.  i will give you the flow i want you to code after clicking the search btn in the modal, the value of input with id=searchCustomerMeterID will retrieve the consumer_name in the costumer table and if the value inputted in searchCustomerMeterID is meter_id it will get value customer_id in the meter_data table then retrieve the consumer_name in the consumer table  then display the consumer_name, in the input with id=ConsumerName, then the consumer_id or meter_id will retrieve the value of meter type and  generate code to get the current date that will serve as the value of the bill_period_end then after that the value of meter type and  bill_period_end(month) will find similar value in the bill_rates table and retrieve the value of rates_per_cubic after that rates_per_cubic will be multiply to consumption and  result of multiply will place in bill_amount (bill_amount = rates_per_cubic  * consumption). then the value of bill_period_beign = bill_period_end - 1 month the due_date = bill_period_end + 7 days then the pay_status has default value in the database then apply the foreign key value  for example in the: (meter_reading table the value of reading_value is same to consumption then reading_data_time is same to bill_period_end) reminder the consumer name will only display in input because the other fields is the user will be the input the value and other are the process to set the accurate data of  bill_records table.
