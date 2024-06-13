<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['users_role'] !== 'customer') {
    header("Location: ../index.php");
    exit();
}

include '../dbcon.php'; // Ensure this file contains the database connection details

$customer_id = $_SESSION['customer_id'];
$username = $_SESSION['username'];

// Fetch customer details
$stmt = $conn->prepare("SELECT customer_name, customer_address, customer_phone, customer_email, users_id FROM customer WHERE customer_id = ?");
$stmt->bind_param("i", $customer_id);
$stmt->execute();
$stmt->bind_result($customer_name, $customer_address, $customer_phone, $customer_email, $user_id);
$stmt->fetch();
$stmt->close();

// Fetch user details
$stmt_user = $conn->prepare("SELECT username, upassword FROM users_acc WHERE users_id = ?");
$stmt_user->bind_param("i", $user_id);
$stmt_user->execute();
$stmt_user->bind_result($username, $password);
$stmt_user->fetch();
$stmt_user->close();

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AquaE-Bill</title>
    <link rel="shortcut icon" href="/favicon.gif" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">


    <style>
        .password-toggle-btn {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .input-group-text {
            background: none;
            border: none;
        }

        html {
            text-rendering: optimizeLegibility;
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poetsen One';
            background-image: linear-gradient(rgba(20, 20, 20, 0.69), rgba(20, 20, 20, 0.69)), url(/aquabill/IMAGES/mainbg2.jpg);
            background-position: center;
            background-size: cover;
        }
    </style>

</head>

<body>

    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-12 col-md-11 my-3 ">
            <div class="card  shadow-lg " style=" width: 100%; ">
                <div class="card-header d-flex justify-content-end"> <!-- Add this class -->
                    <ul class="nav nav-tabs text-end card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active fw-semibold" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-semibold" id="inbox-tab" data-bs-toggle="tab" data-bs-target="#inbox" type="button" role="tab" aria-controls="inbox" aria-selected="false">Inbox</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-semibold" id="check-bills-tab" data-bs-toggle="tab" data-bs-target="#check-bills" type="button" role="tab" aria-controls="check-bills" aria-selected="false">Check Bills</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-semibold" id="logout-tab" data-bs-toggle="tab" data-bs-target="#logout" type="button" role="tab" aria-controls="logout" aria-selected="false">Logout</button>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

    </div>






    <!-- Bootstrap JS and dependencies -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>



    <script>
        document.getElementById('logoutYes').addEventListener('click', function() {
            // Redirect to the index file upon clicking Yes
            window.location.href = '../index.php';
        });
    </script>

    <script>
        // Password toggle script
        document.getElementById('toggle-password').addEventListener('click', function() {
            var passwordInput = document.getElementById('password');
            var icon = this;
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inboxTab = document.getElementById('inbox-tab');
            const blockquote = document.querySelector('#inbox blockquote');
            const cardHeader = document.querySelector('#inbox .card-header');

            inboxTab.addEventListener('click', function() {
                fetch('check_bill.php')
                    .then(response => response.json())
                    .then(data => {
                        if (data.hasBill) {
                            blockquote.querySelector('p').textContent = 'Your monthly bills have arrived. Please check your bills and water consumption!';
                            blockquote.querySelector('footer cite').textContent = 'Administrator';
                            cardHeader.textContent = 'New messages';
                        } else {
                            blockquote.querySelector('p').textContent = 'No bill records yet!';
                            blockquote.querySelector('footer cite').textContent = '';
                            cardHeader.textContent = 'No messages';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkBillsTab = document.getElementById('check-bills-tab');

            checkBillsTab.addEventListener('click', function() {
                fetch('get_bills.php')
                    .then(response => response.json())
                    .then(data => {
                        if (data.length > 0) {
                            const bill = data[0]; // Assuming you want to display the first outstanding bill
                            document.getElementById('bill-id').value = bill.bill_id;
                            document.getElementById('meter-id').value = bill.meter_id;
                            document.getElementById('billing-date-from').value = bill.bill_period_begin;
                            document.getElementById('billing-date-to').value = bill.bill_period_end;
                            document.getElementById('water-consumption').value = bill.consumption;
                            document.getElementById('billing-amount').value = bill.bill_amount;
                        } else {
                            alert('No outstanding bills found.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });


        });
    </script>

    <script>
        document.getElementById('dlbill').addEventListener('click', function() {
            window.location.href = 'download_bill.php';
        });
    </script>


</body>

</html>