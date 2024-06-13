<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>AquaE-Bill</title>

    <link rel="stylesheet" href="../dashC.css">
    <link rel="shortcut icon" href="../favicon.gif" type="image/png">
</head>

<body>
    <div class="sidebar ">
        <div class="d-flex flex-column">
            <a href="#" class="d-flex align-items-center ms-md-2 m-0 me-md-auto text-white text-decoration-none">
                <img src="../IMAGES/dashlogo.gif" title="AquaE-Bill" class="img-fluid rounded mx-auto d-block mt-1" width="50" alt="">
                <span class="fs-5 fw-bold ms-md-1 text-info d-none d-md-inline fontfam">AquaE-Bill</span>
            </a>
            <hr class="border-3">
            <ul class="nav nav-pills flex-column mb-md-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link text-white" data-target="#home" onclick="showContent(event)">
                        <i class="bi bi-house-door" title="Home"></i>
                        <strong class="d-none d-md-inline"> Home</strong>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white" data-target="#dashboard" onclick="showContent(event)">
                        <i class="bi bi-speedometer2" title="Dashboard"></i>
                        <strong class="d-none d-md-inline"> Dashboard</strong>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white" data-target="#customers" onclick="showContent(event)">
                        <i class="bi bi-people"></i>
                        <strong class="d-none d-md-inline"> Customers</strong>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white" data-target="#payments" onclick="showContent(event)">
                        <i class="bi bi-receipt-cutoff"></i>
                        <strong class="d-none d-md-inline">Payments</strong>
                    </a>
                </li>
            </ul>
            <div class="profile">
                <a href="#" class="btn btn-secondary p-1 m-0 d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false">

                    <i class="bi bi-gear-fill me-md-2"> </i>
                    <strong class="d-none d-md-inline"> Settings</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow " aria-labelledby="dropdownProfile">

                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addingadmin">Add
                            Administrator</a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Change Password</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="../index.php">Sign out</a></li>
                </ul>
            </div>

        </div>

    </div>

    <!-- Modal for Adding Administrator -->
    <div class="modal fade" id="addingadmin" aria-hidden="true" aria-labelledby="addingadminTitle" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content text-dark ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addingadminTitle">New Administrator</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="adminForm" action="create_admin.php" method="post" class="row gy-3 needs-validation" novalidate>
                        <div class="my-1">
                            <div class="position-relative">
                                <i class="bi bi-person-lines-fill fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                <input class="form-control form-control-lg ps-5" type="text" placeholder="Username" required name="username" id="username">
                            </div>
                        </div>
                        <div class="col-12 my-1">
                            <div class="position-relative">
                                <i class="bi bi-shield-lock fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                <div class="password-toggle">
                                    <input id="newPassword" class="form-control form-control-lg ps-5" type="password" placeholder="Password" required name="uPassword">
                                    <i class="bi bi-eye-slash fs-lg position-absolute password-toggle-btn" id="toggle-new-password"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 my-1">
                            <div class="position-relative">
                                <i class="bi bi-shield-lock fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                <div class="password-toggle">
                                    <input id="confirmPassword" class="form-control form-control-lg ps-5" type="password" placeholder="Confirm Password" required name="cPassword">
                                    <i class="bi bi-eye-slash fs-lg position-absolute password-toggle-btn" id="toggle-confirm-password"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="position-relative">
                                <button class="btn btn-primary w-100  me-auto" type="submit">CREATE &nbsp;
                                    ADMINISTRATOR
                                    &nbsp; ACCCOUNT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Changing Password -->
    <div class="modal fade" id="changePasswordModal" aria-hidden="true" aria-labelledby="changePasswordTitle" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="changePasswordTitle">Change Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="ms-3 error-message2 text-info"></div>
                <div class="modal-body">
                    <form id="changePasswordForm" action="" method="post" class="row gy-3 needs-validation" novalidate>
                        <div class="my-1">
                            <div class="position-relative">
                                <i class="bi bi-person-lines-fill fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                <input class="form-control form-control-lg ps-5" type="text" placeholder="Username" required name="username" id="username">
                            </div>
                        </div>
                        <div class="col-md-12 my-1">
                            <div class="position-relative">
                                <i class="bi bi-lock-fill fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                <div class="password-toggle">
                                    <input id="currentPassword" class="form-control form-control-lg ps-5" type="password" placeholder="Current Password" required name="currentPassword">
                                    <i class="bi bi-eye-slash fs-lg position-absolute password-toggle-btn" id="toggle-current-password"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 my-1">
                            <div class="position-relative">
                                <i class="bi bi-lock-fill fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                <div class="password-toggle">
                                    <input id="newsPassword" class="form-control form-control-lg ps-5" type="password" placeholder="New Password" required name="newPassword">
                                    <i class="bi bi-eye-slash fs-lg position-absolute password-toggle-btn" id="toggle-news-password"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 my-1">
                            <div class="position-relative">
                                <i class="bi bi-lock-fill fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                <div class="password-toggle">
                                    <input id="confirmsPasswords" class="form-control form-control-lg ps-5" type="password" placeholder="Confirm New Password" required name="confirmPassword">
                                    <i class="bi bi-eye-slash fs-lg position-absolute password-toggle-btn" id="toggle-confirms-passwords"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="position-relative">
                                <button class="btn btn-primary w-100 me-auto" type="submit">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Small modal for displaying messages -->
    <div class="modal fade" id="messageModal2" tabindex="-1" aria-labelledby="messageModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content notif" id="sidespopup">
                <div class="modal-header">
                    <h5 class="modal-title text-info fs-3" id="messageModalLabel2">Notification</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-info fs-5" id="messageModalBody2">
                        <!-- Message will be inserted here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content" id="home">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 mb-md-0 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-info">WATER RATES STATISTICS</h5>
                            <div class="mb-3">
                                <label for="yearSelect" class="form-label">Select Year</label>
                                <select id="yearSelect" class="form-select">
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024" selected>2024</option>

                                </select>
                            </div>
                            <canvas id="salesChart" height="210"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card mb-2">
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-subtitle mb-2 text-info">Monthly Water Consumption</h6>
                                    <div class="stat text-wrap">
                                        <div class="current-consumption">Loading...</div> (per cubic meter)
                                    </div>
                                    <div class="percentage text-success">Previous Month: <span class="previous-consumption">Loading...</span></div>
                                </div>
                                <div class="icon">
                                    <i class="bi bi-droplet-half"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-subtitle mb-2 text-info">Monthly Water Rates</h6>
                                    <div class="stat" id="current-residential-rate">Loading...</div>
                                    <div class="percentage text-success" id="previous-residential-rate">Loading...</div>
                                    <div class="stat" id="current-commercial-rate">Loading...</div>
                                    <div class="percentage text-success" id="previous-commercial-rate">Loading...</div>
                                </div>
                                <div class="icon">
                                    <i class="bi bi-currency-exchange"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-subtitle mb-2 text-info">Total Customers</h6>
                                    <div class="stat" id="total-customers">Loading...</div>
                                </div>
                                <div class="icon">
                                    <i class="bi bi-people"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="card-body p-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-subtitle mb-2 text-info">Pending Payments</h6>
                                    <div class="stat" id="total-outstanding">Loading...</div>
                                    <div class="percentage fs-4 text-danger" id="latest-due-date">Loading...</div>
                                </div>
                                <div class="icon">
                                    <i class="bi bi-cash-coin"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- home javascript -->

    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"> </script>


</body>

</html>