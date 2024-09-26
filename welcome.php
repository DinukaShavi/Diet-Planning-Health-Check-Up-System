<?php
session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Dashboard</title>
    <style>
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
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
        }

        .nav-link{
            display: flex;
            align-items: center;
            padding: 0.75rem;
            position: relative;
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
        }
         
        .dashboard {
            padding: 20px;
            display: flex;
            flex-direction: column;
            margin-left: 250px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right:2rem;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
            background-color: rgba(25, 135, 84, 1);
            color: rgba(255, 255, 255, 1);
            width:300px;
        }

        .card-body {          
            padding: 1rem;
        }

        .card-footer {
            padding: 0.5rem 1rem;
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

        <nav class="sb-sidenav">
            <div class="nav">
                <a class="nav-link" href="welcome.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="profile.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Profile
                </a>
                <a class="nav-link" href="change-password.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-key"></i></div>
                    Change Password
                </a>
                <a class="nav-link" href="logout.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                    Signout
                </a>
            </div>
        </nav>
        <div class="dashboard">
            <main>
                <div>
                    <h1>User Dashboard</h1>
                    <div class="row">
                    <?php
                    $userid = $_SESSION['id'];
                    $query = mysqli_query($con, "select * from users where id='$userid'");
                    while ($result = mysqli_fetch_array($query)) { ?>
                        <div class="row">
                            <div>
                                <div class="card">
                                    <div class="card-body">Welcome Back <?php echo $result['fname'] . ' ' . $result['lname']; ?></div>
                                    <div class="card-footer">
                                        <a class="text-white" href="home-prof/homepage.php">Visit Page</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <div class="card">
                                    <div class="card-body">Tracker Progress</div>
                                    <div class="card-footer">
                                        <a class="text-white" href="services/tracker/health.php">View details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <div class="card">
                                    <div class="card-body">FitCare Cart</div>
                                    <div class="card-footer">
                                        <a class="text-white" href="carts/products.php">View Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
               </div>
            </main>
</body>
</html>
<?php } ?>
