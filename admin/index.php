<?php 
session_start(); 
include_once('../includes/config.php');

// Code for login 
if(isset($_POST['login']))
{
  $adminusername=$_POST['username'];
  $pass=md5($_POST['password']);
  $ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$adminusername' and password='$pass'");
  $num=mysqli_fetch_array($ret);
  if($num>0)
  {
    $extra="dashboard.php";
    $_SESSION['login']=$_POST['username'];
    $_SESSION['adminid']=$num['id'];
    echo "<script>window.location.href='".$extra."'</script>";
    exit();
  }
  else
  {
    echo "<script>alert('Invalid username or password');</script>";
    $extra="index.php";
    echo "<script>window.location.href='".$extra."'</script>";
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> FitCare-Login & Signup </title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header>Login</header>
                <form method="post">
                    <div class="field input-field">
                        <input type="text" name="username" placeholder="Username" class="input" required>
                    </div>

                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Password" class="password" required>
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="form-link">
                        <a href="password-recovery.php" class="forgot-pass">Forgot password?</a>
                    </div>

                    <div class="field button-field">
                        <button name="login" type="submit">Login</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Don't have an account? <a href="signup.php" class="link signup-link">Signup</a></span>
                </div>
                <div class="form-link">
                    <span><a href="../index.php" class="link signup-link">Back to Home</a></span>
                </div>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>
