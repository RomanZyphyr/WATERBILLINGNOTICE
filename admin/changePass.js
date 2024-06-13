$(document).ready(function () {
    $("#changePasswordForm").on("submit", function (e) {
        e.preventDefault();

        // Client-side form validation
        var username = $("#username").val();
        var currentPassword = $("#currentPassword").val();
        var newPassword = $("#newsPassword").val();
        var confirmPassword = $("#confirmsPasswords").val();

        if (!username || !currentPassword || !newPassword || !confirmPassword) {
            $("#changePasswordModal .error-message2").text("All fields are required.");
            return;
        }

        if (newPassword.length < 8) {
            $("#changePasswordModal .error-message2").text("New password must be at least 8 characters long.");
            return;
        }

        if (newPassword !== confirmPassword) {
            $("#changePasswordModal .error-message2").text("New password and confirm password do not match.");
            return;
        }

        $.ajax({
            url: "changePass.php",
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                var responseData = JSON.parse(response);
                if (responseData.success) {
                    $("#changePasswordForm")[0].reset(); // Reset the form fields
                    $("#changePasswordModal .error-message2").text(""); // Clear any existing error messages
                    alert(responseData.message); // Optionally display a success message
                } else {
                    $("#changePasswordModal .error-message2").text(responseData.message); // Display error message in the modal
                }
            },
            error: function () {
                $("#changePasswordModal .error-message2").text("An error occurred. Please try again.");
            }
        });
    });

    // Clear form fields and error message when the modal is closed
    $("#changePasswordModal").on("hidden.bs.modal", function () {
        $("#changePasswordForm")[0].reset();
        $("#changePasswordModal .error-message2").text("");
    });
});