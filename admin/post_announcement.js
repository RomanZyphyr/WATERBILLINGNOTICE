document.getElementById('announcementForm').addEventListener('submit', function (event) {
    event.preventDefault();

    var affectedArea = document.getElementById('affectedArea').value;
    var announcementDate = document.getElementById('announcementDate').value;
    var announcementTime = document.getElementById('announcementTime').value;

    var formData = new FormData();
    formData.append('affected_area', affectedArea);
    formData.append('announcement_date', announcementDate);
    formData.append('announcement_time', announcementTime);

    fetch('post_announcement.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            document.getElementById('messageModalBody').innerText = data.message;
            var messageModal = new bootstrap.Modal(document.getElementById('messageModal'));
            messageModal.show();

            if (data.status === 'success') {
                // Optionally, clear the form
                document.getElementById('announcementForm').reset();
                // Close the post announcement modal
                var postModal = bootstrap.Modal.getInstance(document.getElementById('postAnnouncementModal'));
                postModal.hide();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('messageModalBody').innerText = 'An error occurred. Please try again.';
            var messageModal = new bootstrap.Modal(document.getElementById('messageModal'));
            messageModal.show();
        });
});