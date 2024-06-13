$(document).ready(function () {
    // Form submission for updating rate information
    $("#updateRateModalForm").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: $(this).serialize(),
            dataType: 'json', // Expect JSON response
            success: function (response) {
                if (response.success) {
                    $('#updateRateModal').modal('hide');
                    $('#messageModalBody').text(response.message);
                    $('#messageModal').modal('show');
                } else {
                    $('#messageModalBody').text(response.message);
                    $('#messageModal').modal('show');
                }
            },
            error: function () {
                $('#messageModalBody').text('An error occurred while updating rate information.');
                $('#messageModal').modal('show');
            }
        });
    });

    // Clear form fields and messages when the modal is closed
    $("#updateRateModal").on("hidden.bs.modal", function () {
        $(this).find("input").val(""); // Clear input fields
        $(this).find("select").prop('selectedIndex', 0); // Reset select fields
    });

    // Clear the message modal body when it is closed
    $("#messageModal").on("hidden.bs.modal", function () {
        $('#messageModalBody').text('');
    });
});