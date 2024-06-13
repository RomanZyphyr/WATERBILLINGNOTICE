$(document).ready(function () {
    $("#adminForm").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url: "create_admin.php",
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                var responseData = JSON.parse(response);
                if (responseData.success) {
                    $("#adminForm")[0].reset(); // Reset the form fields
                    showMessage(responseData.success, "success");
                } else {
                    showMessage(responseData.error, "error");
                }
            },
            error: function () {
                showMessage("An error occurred. Please try again.", "error");
            }
        });
    });

    // Function to show messages
    function showMessage(message, type) {
        var messageModalBody2 = $("#messageModalBody2");
        if (type === "success") {
            messageModalBody2.removeClass("text-danger").addClass("text-success");
        } else {
            messageModalBody2.removeClass("text-success").addClass("text-danger");
        }
        messageModalBody2.text(message);
        $("#messageModal2").modal("show");
    }
});