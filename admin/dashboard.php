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

    <div class="main-content d-none" id="dashboard">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-12 ">
                    <div class="card mt-md-0">
                        <div class="card-body ">
                            <h5 class="card-title ">Dashboard</h5>
                            <hr>
                            <div class="container p-md-4">

                                <div class="row mb-md-4 ">
                                    <div class="d-grid col-12  col-md-4 mb-md-0 mb-1">
                                        <button type="button" class="btn btn-secondary hover-button p-md-5" data-bs-toggle="modal" data-bs-target="#createpart1">CREATE
                                            ACCOUNTS</button>
                                    </div>
                                    <div class="d-grid col-12 col-md-4 mb-md-0 mb-1 ">
                                        <button class="btn btn-secondary hover-button p-md-5" data-bs-toggle="modal" data-bs-target="#genebills">GENERATE
                                            BILLS</button>
                                    </div>
                                    <div class="d-grid col-12 col-md-4 mb-md-0 mb-1">
                                        <button class="btn btn-secondary hover-button p-md-5" data-bs-toggle="modal" data-bs-target="#updateRateModal">UPDATE WATER
                                            RATES</button>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class=" d-grid col-12 col-md-6 mb-md-0 mb-1 ">
                                        <button class="btn btn-secondary hover-button  p-md-5 " data-bs-toggle="modal" data-bs-target="#postAnnouncementModal">POST
                                            ANNOUNCEMENTS</button>
                                    </div>
                                    <div class="d-grid col-12 col-md-6 mb-md-0  mb-1">
                                        <button class="btn btn-secondary hover-button  p-md-5" data-bs-toggle="modal" data-bs-target="#updatecustomer">UPDATE CUSTOMER
                                            ACCOUNTS</button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Create Account Modal Structure -->
            <div class="modal fade" id="createpart1" tabindex="-1" aria-labelledby="createpart1one" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered text-dark">
                    <div class="modal-content p-3">
                        <div class="modal-header border-0" data-bs-theme="dark">
                            <h5 class="modal-title fs-3 fw-bold text-info" id="createpart1one">Creating Customer
                                Account
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Error message placeholder -->
                            <div class="error-message text-danger"></div>
                            <form id="createAccountForm" class="row gy-0 needs-validation" novalidate>
                                <hr>
                                <div class="my-1">
                                    <div class="position-relative">
                                        <i class="bi bi-person-badge-fill fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                        <input class="form-control form-control-lg ps-5" type="text" placeholder="Username" required name="username" id="username">
                                    </div>
                                </div>
                                <div class="my-1">
                                    <div class="position-relative">
                                        <i class="bi bi-lock-fill fs-lg position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                        <div class="password-toggle">
                                            <input id="Cpassword" class="form-control form-control-lg ps-5" type="password" placeholder="Password" required name="upassword">
                                            <i class="bi bi-eye-slash fs-lg position-absolute password-toggle-btn" id="toggle-password"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-lg btn-primary" id="createAccountButton">CREATE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Customer Information Modal -->
            <div class="modal fade" id="createpart2" aria-hidden="true" aria-labelledby="createpart2two" tabindex="-1">
                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content text-dark">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-info" id="createpart2two">Customer Information</h1>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Error message placeholder -->
                            <div class="error-message text-danger"></div>
                            <form id="customerInfoForm" class="row gy-3 needs-validation pt-2" novalidate>
                                <div class="col-md-8 my-1">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" id="validationCustom01" name="customer_name" placeholder="Fullname" required>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="col-md-4 my-1">
                                    <div class="position-relative">
                                        <input type="number" class="form-control" id="validationCustom02" name="customer_phone" placeholder="Phone" required>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="col-md-6 my-1">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" id="validationCustom03" name="customer_address" placeholder="Address" required>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="col-md-6 my-1">
                                    <div class="position-relative">
                                        <input type="email" class="form-control" id="validationCustom04" name="customer_email" placeholder="Email" required>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="my-1">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" id="validationCustom05" name="meter_install_address" placeholder="Installation Address" required>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="col-md-6 my-1">
                                    <div class="position-relative">
                                        <select class="form-select" id="validationCustom06" name="meter_type" required>
                                            <option selected disabled value="">Meter Type</option>
                                            <option value="residential">Residential</option>
                                            <option value="commercial">Commercial</option>
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="col-md-6 my-1">
                                    <div class="position-relative">
                                        <select class="form-select" id="validationCustom07" name="meter_location" required>
                                            <option selected disabled value="">Meter Location</option>
                                            <option value="indoor">Indoor</option>
                                            <option value="outdoor">Outdoor</option>
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div class="position-relative">
                                        <button class="btn btn-primary w-100 me-auto" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main billing modal -->
            <div class="modal fade" id="genebills" aria-hidden="true" aria-labelledby="generateBL" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content text-dark">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-info" id="createpart2Title">Customer Billing
                                Information
                            </h1>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="billingForm" method="post" action="process_billing.php" class="row gy-3 needs-validation" novalidate>
                                <div class="my-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="searchCustomerMeterID" name="customer_id" placeholder="Search Customer ID" required>
                                        <button class="btn btn-outline-primary" type="button" id="searchButton">Search</button>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="col-12 my-1">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" id="ConsumerName" name="consumer_name" placeholder="Consumer Name" readonly>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="col-12 my-1">
                                    <div class="position-relative">
                                        <input type="hidden" name="meter_id" id="MeterID">
                                        <input type="number" class="form-control" id="waterConsumptionID" name="consumption" placeholder="Water Consumption (cubic meters)" required>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div class="position-relative">
                                        <button class="btn btn-primary w-100 me-auto" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Updating Rate Information -->
            <div class="modal fade" id="updateRateModal" aria-hidden="true" aria-labelledby="updateRateTitle" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content text-info">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="updateRateTitle">Update Rate Information</h1>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="updateRateModalForm" action="update_rate.php" method="post" class="row gy-3 needs-validation" novalidate>
                                <hr>
                                <div class="col-12 my-1">
                                    <div class="position-relative">
                                        <select class="form-select" id="rateType" name="rates_type" required>
                                            <option selected disabled value="">Rate Type</option>
                                            <option value="residential">Residential</option>
                                            <option value="commercial">Commercial</option>
                                        </select>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="col-12 my-1">
                                    <div class="position-relative">
                                        <input type="number" step="0.01" class="form-control" id="ratePerCubicMeter" name="rates_per_cubic" placeholder="Rate per Cubic Meter ($)" required>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="col-12 my-1">
                                    <div class="position-relative">
                                        <label for="effectiveDate" class="form-label fs-4">Effective Date</label>
                                        <input type="date" class="form-control" id="effectiveDate" name="effective_date" required>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div class="position-relative">
                                        <button class="btn btn-primary w-100 me-auto" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
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