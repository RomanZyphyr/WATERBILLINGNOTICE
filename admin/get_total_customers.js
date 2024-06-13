$(document).ready(function () {
    // Fetch total customers data
    $.ajax({
        url: 'get_total_customers.php',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            if (data && data.total_customers !== undefined) {
                $('#total-customers').text(data.total_customers.toLocaleString());
            } else {
                $('#total-customers').text('Error loading data');
            }
        },
        error: function () {
            $('#total-customers').text('Error loading data');
        }
    });
});