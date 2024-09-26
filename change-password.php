<?php
session_start();
include_once('includes/config.php');

if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['update'])) {
        $oldpassword = $_POST['currentpassword'];
        $newpassword = $_POST['newpassword'];
        $confirmPassword = $_POST['confirmpassword'];
        $userid = $_SESSION['id'];

        $sql = mysqli_query($con, "SELECT password FROM users WHERE id='$userid' AND password='$oldpassword'");
        $num = mysqli_fetch_array($sql);

        if ($num > 0) {
            if ($newpassword == $confirmPassword) {
                $ret = mysqli_query($con, "UPDATE users SET password='$newpassword' WHERE id='$userid'");
                echo "<script>alert('Password Changed Successfully !!');</script>";
                echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
            } else {
                echo "<script>alert('New Password and Confirm Password do not match !!');</script>";
                echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
            }
        } else {
            echo "<script>alert('Old Password not match !!');</script>";
            echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Change Password</title>
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

        input {
        height: 30px;
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

        .update-btn {
            height: 43px;
            margin-left:60px;
            padding: 3px 12px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 2px;
            text-decoration: none;
        }

        .update-btn:hover {
            background-color: #0056b3;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script language="javascript" type="text/javascript">
        function valid() {
            if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                alert("New Password and Confirm Password Field do not match !!");
                document.changepassword.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>

<body class="sb-nav-fixed">
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

        <main>
            <div class="container">
                <h1>Change Password</h1>
                <div class="card">
                    <form method="post" name="changepassword" onSubmit="return valid();">
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Current Password</th>
                                    <td><input id="currentpassword" name="currentpassword" type="password" value="" required /></td>
                                </tr>
                                <tr>
                                    <th>New Password</th>
                                    <td><input id="newpassword" name="newpassword" type="password" value="" required /></td>
                                </tr>
                                <tr>
                                    <th>Confirm Password</th>
                                    <td><input id="confirmpassword" name="confirmpassword" type="password" required /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:center ;"><button type="submit" class="update-btn" name="update">Change</button></td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </main>
</body>

</html>
<?php } ?>
