$(document).ready(function () {
    $('#billingForm').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Serialize form data
        var formData = $(this).serialize();

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: formData,
            dataType: 'json', // Expect JSON response
            success: function (response) {
                // Update the message modal with the response message
                $('#messageModalBody').html(response.message);
                // Show the message modal
                $('#messageModal').modal('show');
                if (response.status === 'success') {
                    $('#billingForm')[0].reset(); // Reset the form only on success
                }
            },
            error: function (xhr, status, error) {
                // Handle errors here if necessary
                console.error(xhr.responseText);
                $('#messageModalBody').html("An error occurred. Please try again.");
                $('#messageModal').modal('show');
            }
        });
    });

    // Existing code for fetching customer data
    $('#searchButton').click(function () {
        var customer_id = $('#searchCustomerMeterID').val();
        if (customer_id != '') {
            $.ajax({
                url: "fetch_customer.php",
                method: "POST",
                data: { customer_id: customer_id },
                dataType: 'json', // Expect JSON response
                success: function (response) {
                    if (response.customer_name && response.meter_id) {
                        $('#ConsumerName').val(response.customer_name);
                        $('#MeterID').val(response.meter_id);
                    } else if (response.message) {
                        $('#messageModalBody').html(response.message);
                        $('#messageModal').modal('show');
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    $('#messageModalBody').html("An error occurred while fetching customer data. Please try again.");
                    $('#messageModal').modal('show');
                }
            });
        } else {
            $('#messageModalBody').html("Please enter a Customer ID.");
            $('#messageModal').modal('show');
        }
    });
});