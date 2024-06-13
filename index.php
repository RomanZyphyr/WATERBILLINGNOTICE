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


  
    <header id="headnav" class="py-0 m-0 ">
        <!-- Back to Top Button -->
        <button id="backToTopBtn" title="Go to top"><i class="bi bi-arrow-up-circle"></i></button>

        <div class="container my-md-0 mt-0 pt-3  ">
            <div class="jumbotron p-3 m-0 bg-light border rounded-3 px-md-5 py-md-4 wspace">
                <h1 class="display-4 text-info fw-bold ">Welcome to AquaE-Bill</h1>
                <p class="lead text-dark fst-italic fs-2 ">Transforming Water Billing for a <span id="typed-strings" data-typed='{"strings": ["Greener Tomorrow.", "Greater Life."]}'></span><span class="typed-cursor"></span>
                </p>
                <hr class="my-4">
                <blockquote class="blockquote">
                    <p class="fw-bolder text-success text-justify fs-5">
                        AquaE-Bill is your cutting-edge solution for water billing, designed to eliminate the hassles of paper-based
                        bills and bring you a seamless, eco-friendly experience.
                    </p>
                </blockquote>

                <div class="d-grid gap-2 col-6 col-md-3 ms-md-auto mt-md-4 my-1">
                    <button class="btn btn-primary btn-lg btnStart " data-bs-toggle="modal" data-bs-target="#userModal">Get
                        Started</button>
                </div>
            </div>
        </div>

        <!-- FEATURES -->
        <section class="py-0 pt-md-4 border-bottom">
            <div class="container mt-3">
                <div class="row featss my-3">
                    <div class="col-12 col-md-4 aos-init aos-animate clearfix bg-light text-dark p-3 rounded mb-2 mb-md-3 me-md-2 feats" data-aos="fade-up">
                        <!-- Icon and Heading -->
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon text-primary me-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="none" fill-rule="evenodd">
                                        <path d="M0 0h24v24H0z"></path>
                                        <path d="M5.5 4h4A1.5 1.5 0 0111 5.5v1A1.5 1.5 0 019.5 8h-4A1.5 1.5 0 014 6.5v-1A1.5 1.5 0 015.5 4zm9 12h4a1.5 1.5 0 011.5 1.5v1a1.5 1.5 0 01-1.5 1.5h-4a1.5 1.5 0 01-1.5-1.5v-1a1.5 1.5 0 011.5-1.5z" fill="#335EEA"></path>
                                        <path d="M5.5 10h4a1.5 1.5 0 011.5 1.5v7A1.5 1.5 0 019.5 20h-4A1.5 1.5 0 014 18.5v-7A1.5 1.5 0 015.5 10zm9-6h4A1.5 1.5 0 0120 5.5v7a1.5 1.5 0 01-1.5 1.5h-4a1.5 1.5 0 01-1.5-1.5v-7A1.5 1.5 0 0114.5 4z" fill="#335EEA" opacity=".3"></path>
                                    </g>
                                </svg>
                            </div>
                            <h3 class="mb-0">Eco-Friendly</h3>
                        </div>
                        <!-- Text -->
                        <p class="text-body-secondary mb-0">
                            Reduce paper waste and contribute to environmental sustainability by going
                            digital.
                        </p>
                    </div>
                    <div class="col-12 col-md-4 aos-init aos-animate bg-light text-dark p-3 rounded  mb-2 ms-md-2 mb-md-3 feats" data-aos="fade-up" data-aos-delay="50">
                        <!-- Icon and Heading -->
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon text-primary me-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="none" fill-rule="evenodd">
                                        <path d="M0 0h24v24H0z"></path>
                                        <path d="M7 3h10a4 4 0 110 8H7a4 4 0 110-8zm0 6a2 2 0 100-4 2 2 0 000 4z" fill="#335EEA"></path>
                                        <path d="M7 13h10a4 4 0 110 8H7a4 4 0 110-8zm10 6a2 2 0 100-4 2 2 0 000 4z" fill="#335EEA" opacity=".3"></path>
                                    </g>
                                </svg>
                            </div>
                            <h3 class="mb-0">Instant Access</h3>
                        </div>
                        <!-- Text -->
                        <p class="text-body-secondary mb-0">
                            Receive and review your water bills instantly from anywhere, at any time.
                        </p>
                    </div>
                    <div class="col-12 col-md-5 aos-init aos-animate bg-light text-dark p-3 rounded mb-2 me-md-2 feats" data-aos="fade-up" data-aos-delay="100">
                        <!-- Icon and Heading -->
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon text-primary me-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="none" fill-rule="evenodd">
                                        <path d="M0 0h24v24H0z"></path>
                                        <path d="M17.272 8.685a1 1 0 111.456-1.37l4 4.25a1 1 0 010 1.37l-4 4.25a1 1 0 01-1.456-1.37l3.355-3.565-3.355-3.565zm-10.544 0L3.373 12.25l3.355 3.565a1 1 0 01-1.456 1.37l-4-4.25a1 1 0 010-1.37l4-4.25a1 1 0 011.456 1.37z" fill="#335EEA"></path>
                                        <rect fill="#335EEA" opacity=".3" transform="rotate(15 12 12)" x="11" y="4" width="2" height="16" rx="1"></rect>
                                    </g>
                                </svg>
                            </div>
                            <h3 class="mb-0">Secure and Private</h3>
                        </div>
                        <!-- Text -->
                        <p class="text-body-secondary mb-0">
                            Rest assured that your billing information is protected with advanced
                            security measures.
                        </p>
                    </div>
                    <div class="col-12 col-md-5 aos-init aos-animate bg-light text-dark p-3 rounded mb-2 ms-md-2 feats" data-aos="fade-up" data-aos-delay="150">
                        <!-- Icon and Heading -->
                        <div class="d-flex align-items-center mb-2">
                            <div class="icon text-primary me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-menu-down" viewBox="0 0 16 16">
                                    <path d="M7.646.146a.5.5 0 0 1 .708 0L10.207 2H14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h3.793zM1 7v3h14V7zm14-1V4a1 1 0 0 0-1-1h-3.793a1 1 0 0 1-.707-.293L8 1.207l-1.5 1.5A1 1 0 0 1 5.793 3H2a1 1 0 0 0-1 1v2zm0 5H1v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM2 4.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5m0 4a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5" />
                                </svg>
                            </div>
                            <h3 class="mb-0">Timely Notifications</h3>
                        </div>
                        <!-- Text -->
                        <p class="text-body-secondary mb-0">
                            Never miss a payment with automatic reminders and updates about
                            your billing cycles.
                        </p>
                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .container -->
        </section>
        <!-- FEATURES -->


        <!-- Login Modal Structure -->
        <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content login_bg p-3">
                    <div class="modal-header border-0">
                        <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Login AquaE-Bill</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="loginForm" action="login.php" method="post" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <div class="position-relative">
                                    <i class="bi bi-person-badge-fill fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                    <input class="form-control form-control-lg ps-5" type="text" name="username" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="position-relative">
                                    <i class="bi bi-lock-fill fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                    <div class="password-toggle">
                                        <input id="upassword" class="form-control form-control-lg ps-5" type="password" name="upassword" placeholder="Password" required>
                                        <i class="bi bi-eye-slash fs-lg position-absolute password-toggle-btn" id="toggle-password"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap align-items-center justify-content-between pb-4">
                                <div class="form-check my-1">
                                    <input class="form-check-input" type="checkbox" id="keep-signedin">
                                    <label class="form-check-label ms-1" for="keep-signedin">Keep me signed in</label>
                                </div>
                                <a class="fs-sm fw-semibold text-decoration-none my-1" id="forpass" href="#">Forgot password?</a>
                            </div>
                            <button class="btn btn-lg btn-primary w-100 mb-4" type="submit">Sign in</button>
                            <div id="loginError" class="text-danger"></div>
                            <!-- Sign in with social account -->
                            <h2 class="h6 text-center pt-3 pt-lg-4 mb-4 border-top border-3 border-dark">Or sign in with your social
                                account</h2>
                            <div class="row row-cols-1 row-cols-sm-2 gy-3">
                                <div class="col">
                                    <a class="btn btn-icon btn-outline-danger btn-google btn-sm w-100" href="#">
                                        <i class="bi bi-google fs-xl me-2"></i>
                                        Google
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="btn btn-icon btn-outline-primary btn-facebook btn-sm w-100" href="#">
                                        <i class="bi bi-facebook fs-xl me-2"></i>
                                        Facebook
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </header>







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