$(document).ready(function () {
    // Clear form fields when a modal is closed
    $(".modal").on("hidden.bs.modal", function () {
        $(this).find("input").val(""); // Clear input fields
        $(this).find("select").prop('selectedIndex', 0); // Reset select fields
        $(this).find(".error-message").text(""); // Clear error messages
    });

    // Form submission for creating account
    $("#createAccountForm").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "../admin/create_account.php",
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                var responseData = JSON.parse(response);
                if (responseData.success) {
                    $("#createpart1").modal("hide");
                    $("#createpart2").modal("show");
                } else {
                    // Display error message in the modal
                    $("#createpart1 .error-message").text(responseData.message);
                }
            },
            error: function () {
                $("#createpart1 .error-message").text("An error occurred while creating the account.");
            }
        });
    });

    // Form submission for submitting customer info
    $("#customerInfoForm").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "../admin/submit_customer_info.php",
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                var responseData = JSON.parse(response);
                if (responseData.success) {
                    // Show success message modal
                    $('#messageModalBody').html(responseData.message);
                    $('#messageModal').modal('show');
                    $("#createpart2").modal("hide");
                } else {
                    // Display error message in the modal
                    $("#createpart2 .error-message").text(responseData.message);
                }
            },
            error: function () {
                $("#createpart2 .error-message").text("An error occurred while submitting customer information.");
            }
        });
    });
});