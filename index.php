<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">




    <title>AquaE-Bill</title>
    <link href="/aquabill/carousel.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.gif" type="image/png">
    <link rel="stylesheet" href="styles.css">
</head>


<body>
    <!-- Navigation -->
    <div class="container-fluid navcon sticky-top ">
        <nav class="navbar navbar-expand-md">
            <img src="IMAGES/mainlogo.png" alt="OCWD" class="img-thumbnail p-0 m-0 border border-info border-3" width="180">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto mainItem align-middle px-0 py-2">
                    <a href="#headnav" class="nav-item nav-link navItem mx-2">Home</a>
                    <a href="#rateup" class="nav-item nav-link navItem mx-2">News & Updates</a>
                    <a href="#aboutus" class="nav-item nav-link navItem mx-2">About Us</a>
                    <button type="button" class="btn btn-outline-info border rounded-pill ms-4 me-2 py-1 navLog" data-bs-toggle="modal" data-bs-target="#userModal">Login</button>
                </div>
            </div>
        </nav>
    </div>








    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"> </script>

    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"> </script>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- Bootstrap JS Bundle (includes Popper) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12K7tmU5H8fN51E0frS7EZ6pXgnLLRT54Hiou8GZl5CZHP0E" crossorigin="anonymous"></script> -->


    <!-- Custom JS for clearing fields and showing modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Clear form fields when modal is closed
            document.getElementById('userModal').addEventListener('hidden.bs.modal', function() {
                var form = document.querySelector('#userModal form');
                form.reset();
                form.classList.remove('was-validated');
            });

            // Toggle password visibility
            document.getElementById('toggle-password').addEventListener('click', function() {
                const passwordField = document.getElementById('upassword');
                const icon = this;
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                } else {
                    passwordField.type = 'password';
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                }
            });
        });
    </script>


    <!-- Custom JS for Typing Effect -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var options = {
                strings: JSON.parse(document.getElementById('typed-strings').getAttribute('data-typed')).strings,
                typeSpeed: 50,
                backSpeed: 75,
                backDelay: 2000,
                startDelay: 2000,
                loop: true
            };

            new Typed('#typed-strings', options);
        });
    </script>

    <script>
        // Smooth scrolling with reduced offset
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const target = document.querySelector(this.getAttribute('href'));
                const offset = 90; // Adjust this value as needed

                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - offset,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

    <script>
        // Show the button when the user scrolls down 100px from the top
        window.onscroll = function() {
            document.getElementById('backToTopBtn').style.display = window.scrollY > 300 ? 'block' : 'none';
        };

        // Scroll to the top when the user clicks on the button
        document.getElementById('backToTopBtn').onclick = function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        };
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const comm = {
                '2006': [10, 43, 23, 40, 37, 70, 63, 77, 92, 88, 85, 82],
                '2009': [100, 92, 84, 88, 86, 90, 94, 98, 10, 10, 1, 11],
                '2012': [100, 97, 95, 93, 90, 88, 85, 83, 80, 78, 75, 73],
                '2015': [100, 97, 93, 90, 87, 83, 80, 77, 73, 70, 67, 63],
                '2018': [100, 97, 94, 91, 88, 85, 82, 79, 76, 73, 70, 67],
                '2021': [100, 97, 93, 90, 87, 83, 80, 77, 73, 70, 67, 63]
            }
            const res = {
                '2006': [95, 89, 79, 75, 83, 88, 90, 93, 88, 85, 80, 78],
                '2009': [110, 105, 100, 98, 95, 92, 88, 85, 80, 78, 75, 70],
                '2012': [90, 85, 80, 77, 75, 73, 70, 68, 65, 63, 60, 58],
                '2015': [85, 80, 75, 70, 68, 65, 63, 60, 58, 55, 53, 50],
                '2018': [75, 70, 65, 63, 60, 58, 55, 53, 50, 48, 45, 43],
                '2021': [80, 75, 70, 68, 65, 63, 60, 58, 55, 53, 50, 48]
            };

            const ctx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    datasets: [{
                            label: 'Commercial',
                            data: comm['2006'],
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            fill: true,
                        },
                        {
                            label: 'Residential',
                            data: res['2006'],
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            fill: true,
                        },
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return value.toLocaleString(); // convert number to string with comma separator
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        }
                    }
                }
            });

            document.getElementById('yearSelect').addEventListener('change', function() {
                const selectedYear = this.value;
                salesChart.data.datasets[0].data = comm[selectedYear];
                salesChart.data.datasets[1].data = res[selectedYear];
                salesChart.update();
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('loginForm');
            loginForm.addEventListener('submit', function(event) {
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
    </script>
</body>

</html>