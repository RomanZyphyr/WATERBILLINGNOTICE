$(document).ready(function () {
    // Fetch monthly water consumption data
    $.ajax({
        url: 'monthly_consumption.php',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            if (data) {
                $('.current-consumption').text(data.total_current ? data.total_current : '0');
                $('.previous-consumption').text(data.total_previous ? data.total_previous : '0');
            } else {
                $('.current-consumption').text('0');
                $('.previous-consumption').text('0');
            }
        },
        error: function () {
            $('.current-consumption').text('Error loading data');
            $('.previous-consumption').text('Error loading data');
        }
    });
});