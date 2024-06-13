 //  update accounts

 $(document).ready(function () {
    $('#searchButtonUpdate').click(function () {
        var customer_id = $('#searchUpdateCustomerID').val();
        if (customer_id != '') {
            $.ajax({
                url: "get_customer_info.php",
                method: "POST",
                data: { customer_id: customer_id },
                success: function (data) {
                    var result = JSON.parse(data);
                    if (result.message) {
                        $('#messageModalBody').text(result.message);
                        $('#messageModal').modal('show');
                    } else {
                        $('#Updateusername').val(result.username);
                        $('#Updatepassword').val(''); // Leave password field blank
                        $('#Updatename').val(result.customer_name);
                        $('#Updatephone').val(result.customer_phone);
                        $('#Updateaddress').val(result.customer_address);
                        $('#Updateemail').val(result.customer_email);
                        $('#cstatus').val(result.customer_status);
                    }
                }
            });
        }
    });

    $('#customerInfoFormUpdate').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Serialize form data
        var formData = $(this).serialize();

        $.ajax({
            url: "update_customer_info.php",
            method: "POST",
            data: formData,
            dataType: 'json', // Expect JSON response
            success: function (response) {
                $('#messageModalBody').text(response.message);
                $('#messageModal').modal('show');
            },
            error: function (xhr, status, error) {
                // Handle errors here if necessary
                console.error(xhr.responseText);
            }
        });
    });
});