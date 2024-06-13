
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
                // Update modal body with the response message
                $('.modal-body').html('<p class="text-info fw-bold">' + response.message + '</p>');
            },
            error: function (xhr, status, error) {
                // Handle errors here if necessary
                console.error(xhr.responseText);
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
                success: function (data) {
                    var result = JSON.parse(data);
                    $('#ConsumerName').val(result.customer_name);
                    $('#MeterID').val(result.meter_id);
                }
            });
        }
    });
});
