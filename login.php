<?php
session_start();
include_once('includes/config.php');

if (isset($_POST['login'])) {
    $useremail = $_POST['uemail'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($con, "SELECT id, fname FROM users WHERE email=? AND password=?");
    mysqli_stmt_bind_param($stmt, "ss", $useremail, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_bind_result($stmt, $id, $fname);
        mysqli_stmt_fetch($stmt);

        $_SESSION['id'] = $id;
        $_SESSION['name'] = $fname;
        header("location: welcome.php");
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }

    mysqli_stmt_close($stmt);
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
                        <input type="email" name="uemail" placeholder="Email" class="input" required>
                    </div>

                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Password" class="password" required>
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="form-link">
                        <a href="password-recovery.php" class="forgot-pass">Forgot password?</a>
                    </div>

                    <div class="field button-field">
                        <button type="submit" name="login">Login</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Don't have an account? <a href="signup.php" class="link signup-link">Signup</a></span>
                </div>
            </div>
        </div>                                                                                                                                                                  
    </section>

    <script src="script.js"></script>  
</body>
</html>
