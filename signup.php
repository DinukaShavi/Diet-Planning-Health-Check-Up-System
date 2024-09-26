<?php
session_start();
require_once('includes/config.php');

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];

    $stmt = mysqli_prepare($con, "SELECT id FROM users WHERE email=?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $row = mysqli_stmt_num_rows($stmt);

    if ($row > 0) {
        echo "<script>alert('Email id already exists with another account. Please try with another email id');</script>";
    } else {

        $stmt = mysqli_prepare($con, "INSERT INTO users(fname, lname, email, password, contactno) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $email, $password, $contact);
        $msg = mysqli_stmt_execute($stmt);

        if ($msg) {
            echo "<script>alert('Registered successfully');</script>";
            echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
        } else {
            echo "<script>alert('Registration failed');</script>";
        }

        mysqli_stmt_close($stmt);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitcare-Signup</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript">
        function checkpass() {
            if (document.signup.password.value != document.signup.confirmpassword.value) {
                alert('Password and Confirm Password field does not match');
                document.signup.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
   <div class="container">             
                                    <form method="post" name="signup" onsubmit="return checkpass();">
                                        <section class="container forms">
                                            <div class="form login">
                                                <div class="form-content">
                                                    <header>Signup</header>
                                                    <div class="field input-field">
                                                        <input class="form-control" id="fname" name="fname" type="text" placeholder="Enter your first name" required />                                   
                                                    </div>

                                                    <div class="field input-field">
                                                        <input class="form-control" id="lname" name="lname" type="text" placeholder="Enter your last name" required />                                                   
                                                    </div>

                                                    <div class="field input-field">
                                                        <input class="form-control" id="contact" name="contact" type="text" placeholder="contact number" required pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10" required />                                                   
                                                    </div>

                                                    <div class="field input-field">
                                                        <input class="form-control" id="email" name="email" type="email" placeholder="E-mail" required />                                                      
                                                    </div>

                                                    <div class="field input-field">
                                                        <input class="form-control" id="password" name="password" type="password" placeholder="Create a password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required/>                                                   
                                                    </div>

                                                    <div class="field input-field">
                                                        <input class="form-control" id="confirmpassword" name="confirmpassword" type="password" placeholder="Confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required />                                                     
                                                    </div>

                                                    <div class="field button-field">
                                                        <button type="submit" class="btn btn-primary btn-block" name="submit">Create Account</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </form>
                </div> 
    <script src="js/scripts.js"></script>
</body>
</html>
