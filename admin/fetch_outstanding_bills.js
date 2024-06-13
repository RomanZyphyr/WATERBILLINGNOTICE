$(document).ready(function () {
    $('#statusload').click(function () {
        $.ajax({
            url: 'fetch_outstanding_bills.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                var tbody = '';
                data.forEach(function (bill, index) {
                    tbody += '<tr>' +
                        '<th scope="row">' + (index + 1) + '</th>' +
                        '<td>' + bill.customer_id + '</td>' +
                        '<td>' + bill.bill_id + '</td>' +
                        '<td>' + bill.bill_period_begin + ' - ' + bill.bill_period_end + '</td>' +
                        '<td>' + bill.bill_amount + '</td>' +
                        '<td>' + bill.pay_status + '</td>' +
                        '</tr>';
                });
                $('tbody').html(tbody);
            }
        });
    });

    $('#paybtn').click(function () {
        var bill_id = $('#paymentsearch').val();
        if (bill_id) {
            // Check if the bill is outstanding
            $.ajax({
                url: 'check_bill_status.php',
                method: 'POST',
                data: { bill_id: bill_id },
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'outstanding') {
                        // Show the confirmation modal if the status is outstanding
                        $('#confirmPaymentModal').data('bill-id', bill_id).modal('show');
                    } else {
                        $('#messageModalBody1').text('The bill status is not outstanding.');
                        $('#messageModal1').modal('show');
                    }
                },
                error: function () {
                    $('#messageModalBody1').text('An error occurred while checking bill status.');
                    $('#messageModal1').modal('show');
                }
            });
        } else {
            $('#messageModalBody1').text('Please enter a valid BILL ID.');
            $('#messageModal1').modal('show');
        }
    });

    $('#confirmPaymentButton').click(function () {
        var bill_id = $('#confirmPaymentModal').data('bill-id');
        $.ajax({
            url: 'update_bill_status.php',
            method: 'POST',
            data: { bill_id: bill_id },
            dataType: 'json',
            success: function (response) {
                $('#confirmPaymentModal').modal('hide');
                $('#messageModalBody1').text(response.message);
                $('#messageModal1').modal('show');
            },
            error: function () {
                $('#confirmPaymentModal').modal('hide');
                $('#messageModalBody1').text('An error occurred while updating payment status.');
                $('#messageModal1').modal('show');
            }
        });
    });
});