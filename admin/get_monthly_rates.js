$(document).ready(function () {
    // Fetch monthly water rates data
    $.ajax({
        url: 'get_monthly_rates.php',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            if (data) {
                // Update residential rates
                if (data.rates_current && data.rates_current['residential']) {
                    $('#current-residential-rate').text('₱' + data.rates_current['residential'] + ' Residential');
                } else {
                    $('#current-residential-rate').text('N/A Residential');
                }

                if (data.rates_previous && data.rates_previous['residential']) {
                    $('#previous-residential-rate').text('₱' + data.rates_previous['residential'] + ' Previous Month');
                } else {
                    $('#previous-residential-rate').text('N/A Previous Month');
                }

                // Update commercial rates
                if (data.rates_current && data.rates_current['commercial']) {
                    $('#current-commercial-rate').text('₱' + data.rates_current['commercial'] + ' Commercial');
                } else {
                    $('#current-commercial-rate').text('N/A Commercial');
                }

                if (data.rates_previous && data.rates_previous['commercial']) {
                    $('#previous-commercial-rate').text('₱' + data.rates_previous['commercial'] + ' Previous Month');
                } else {
                    $('#previous-commercial-rate').text('N/A Previous Month');
                }
            } else {
                $('#current-residential-rate').text('Error loading data');
                $('#previous-residential-rate').text('Error loading data');
                $('#current-commercial-rate').text('Error loading data');
                $('#previous-commercial-rate').text('Error loading data');
            }
        },
        error: function () {
            $('#current-residential-rate').text('Error loading data');
            $('#previous-residential-rate').text('Error loading data');
            $('#current-commercial-rate').text('Error loading data');
            $('#previous-commercial-rate').text('Error loading data');
        }
    });
});