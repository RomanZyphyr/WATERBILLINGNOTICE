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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- home javascript -->

    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"> </script>


</body>

</html>