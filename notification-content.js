document.addEventListener('DOMContentLoaded', function () {
    const notificationContent = document.getElementById('notification-content');
    const noPostsMessage = document.getElementById('no-posts-message');

    // Simulate admin content - set to false to test "No posts" message
    const hasAdminContent = false;

    if (hasAdminContent) {
      notificationContent.innerHTML = `
            <div class="col-md-12">
            <h2 class="featurette-heading fw-bold lh-1">Scheduled Maintenance Notification</h2>
            <p class="lead" style="font-size: 1.25rem; font-weight: 500; line-height: 1.6;">
            Dear Valued Customer,<br><br>
            Please be informed that there will be a scheduled maintenance/repair in your area on the following date and time:<br>
            <strong>Area Affected:</strong> Mobod<br>
            <strong>Date:</strong> June 15, 2024<br>
            <strong>Time:</strong> 8:00 AM - 4:00 PM<br>
            <br>
            During this period, water supply may be temporarily disrupted. We apologize for any inconvenience this may cause and appreciate your understanding and cooperation.<br><br>
            For any inquiries or assistance, please contact our customer service at (555) 123-4567.<br><br>
            Thank you,<br>
            Your Water Utility Company
            </p>
            </div>
            `;
      noPostsMessage.style.display = 'none';
    } else {
      notificationContent.style.display = 'none';
    }
  });