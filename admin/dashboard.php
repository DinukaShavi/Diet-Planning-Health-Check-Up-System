<?php
session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid'] == 0)) {
    header('location:logout.php');
} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            display: flex;
            height: 100vh;
        }

        .sb-sidenav {
            width: 250px;
            height: 100%;
            background-color: #212529;
            color: rgba(255, 255, 255, 0.5);
            overflow-y: auto;
        }


        .sb-sidenav .sb-sidenav-menu .nav .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem;
            position: relative;
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            transition: color 0.15s ease-in-out;
        }

        .sb-sidenav .sb-sidenav-menu .nav .nav-link:hover {
            color: #fff;
        }

        .dashboard {
            flex: 3;
            padding: 20px;
        }

        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
        }

        .row>* {
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--bs-gutter-x) * .5);
            padding-left: calc(var(--bs-gutter-x) * .5);
            margin-top: var(--bs-gutter-y);
        }

        .col-md-6 {
            flex: 0 0 auto;
            width: 50%;
        }

        .col-xl-3 {
            flex: 0 0 auto;
            width: 25%;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
            background-color: rgba(25, 135, 84, 1);
        }

        .card-body {
            flex: 1 1 auto;
            padding: 1rem;
        }

        .card-footer {
            padding: 0.5rem;
        }

        .text-success {
            color: rgba(25, 135, 84, 1);
        }

        .text-white {
            color: rgba(255, 255, 255, 1);
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <div class="sb-sidenav">
        <nav class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="dashboard.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <a class="nav-link" href="manage-users.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Manage Users
                </a>

                <a class="nav-link" href="logout.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                    Signout
                </a>
            </div>
        </nav>
    </div>

    <div class="dashboard">
        <h1>Admin Dashboard</h1>
        <div class="row">
            <?php
            $query = mysqli_query($con, "select id from users");
            $totalusers = mysqli_num_rows($query);
            ?>

            <div class="col-xl-3 col-md-6">
                <div class="card text-white">
                    <div class="card-body">Registered Users <span style="font-size:22px;"><?php echo $totalusers; ?></span></div>
                    <div class="card-footer">
                        <a class="text-white" href="manage-users.php">View Details</a>
                    </div>
                </div>
            </div>

            <?php
            $query1 = mysqli_query($con, "select id from users where date(posting_date)=CURRENT_DATE()-1");
            $yesterdayregusers = mysqli_num_rows($query1);
            ?>

            <div class="col-xl-3 col-md-6">
                <div class="card text-white">
                    <div class="card-body">Cart <span style="font-size:22px;"></span></div>
                    <div class="card-footer">
                        <a class="text-white" href="../carts/admin.php">View Details</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card text-white">
                    <div class="card-body"> Appointments <span style="font-size:22px;"></span></div>
                    <div class="card-footer">
                        <a class="text-white" href="appoinment.php">View Details</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card text-white">
                    <div class="card-body">Tracker <span style="font-size:22px;"></span></div>
                    <div class="card-footer">
                        <a class="text-white" href="">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6" style="margin-top:2rem;">
                <div class="card text-white">
                    <div class="card-body">Orders <span style="font-size:22px;"></span></div>
                    <div class="card-footer">
                        <a class="text-white" href="displayorders.php">View Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php } ?>
