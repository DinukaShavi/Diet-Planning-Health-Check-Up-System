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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Profile | Registration and Login System</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
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

        .container {
            margin-left: 300px;
        }

        .sidenav {
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

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem;
            position: relative;
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
        }

        .nav-link:hover {
            color: #fff;
        }

        .card {
            margin-top: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .edit-link {
        height: 43px;
        padding: 8px 15px;
        font-size: 16px;
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
        border-radius: 2px;
        text-decoration:none;
        margin-left:23px;
    }

    .edit-link:hover {
        background-color: #0056b3;
    }
        
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
        <nav class="sidenav">
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
        <div>
            <main>
                <div class="container">
                    <?php
                    $userid = $_SESSION['id'];
                    $query = mysqli_query($con, "select * from users where id='$userid'");
                    while ($result = mysqli_fetch_array($query)) { ?>
                        <h1><?php echo $result['fname'] . ' ' . $result['lname'];?>'s Profile</h1>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Username</th>
                                        <td><?php echo $result['fname'] . ' ' . $result['lname'];?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td colspan="3"><?php echo $result['email'];?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Contact No.</th>
                                        <td colspan="3"><?php echo $result['contactno'];?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Reg. Date</th>
                                        <td colspan="3"><?php echo $result['posting_date'];?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <a href="edit-profile.php" class="edit-link">Edit</a>
                    <?php } ?>

                </div>
            </main>
        </div>
</body>

</html>
<?php } ?>
