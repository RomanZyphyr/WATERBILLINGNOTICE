document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('loginForm');
    loginForm.addEventListener('submit', function (event) {
      const loginError = document.getElementById('loginError');
      loginError.textContent = ''; // Clear previous error messages

      event.preventDefault(); // Prevent form from submitting normally

      const formData = new FormData(loginForm);
      fetch('login.php', {
        method: 'POST',
        body: formData
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            if (data.users_role === 'customer') {
              window.location.href = 'customer/client.php';
            } else if (data.users_role === 'admin') {
              window.location.href = 'admin/dashboard.php';
            }
          } else {
            loginError.textContent = data.message; // Display error message
          }
        })
        .catch(error => {
          loginError.textContent = 'An error occurred. Please try again.';
        });
    });
  });