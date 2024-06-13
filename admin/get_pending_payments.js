$(document).ready(function () {
    // Fetch total outstanding payments and latest due date
    $.ajax({
        url: 'get_pending_payments.php',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            if (data) {
                $('#total-outstanding').text(data.total_outstanding);
                $('#latest-due-date').text('DueDate: ' + data.latest_due_date);
            } else {
                $('#total-outstanding').text('N/A');
                $('#latest-due-date').text('DueDate: N/A');
            }
        },
        error: function () {
            $('#total-outstanding').text('Error loading data');
            $('#latest-due-date').text('DueDate: Error loading data');
        }
    });
});