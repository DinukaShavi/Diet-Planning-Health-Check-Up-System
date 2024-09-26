<?php
session_start();
include_once('../../includes/config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get input values
    $name = $_POST["Name"];
    $email = $_POST["Email"];
    $phone = $_POST["Phone"];
    $date = $_POST["datetime_date"];
    $time = $_POST["datetime_time"];
    $serviceType = $_POST["serviceType"];
    $message = $_POST["Message"];

    // Validate inputs (you can add more validation)
    if (!empty($name) && !empty($email) && !empty($phone) && !empty($date) && !empty($time) && !empty($serviceType)) {
        // Insert data into the appointment_data table without prepared statement
        $sqlInsert = "INSERT INTO `appointment_data` (name, email, phone, date, time, service_type, message) 
                      VALUES ('$name', '$email', '$phone', '$date', '$time', '$serviceType', '$message')";

        if ($con->query($sqlInsert) === TRUE) {
            // Data insertion successful
            echo "<script>alert('Appointment data successfully added!');</script>";
        } else {
            // Error in data insertion
            echo "<script>alert('Error adding appointment data. Please try again later.');</script>";
        }
    } else {
        // Fields not filled
        echo "<script>alert('Please fill in all required fields.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitCare - Make An Appointment</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

    <header class="header">
        <a href="#" class="logo"> FitCare </a>
        <nav class="navbar">
            <a href="../../home-prof/homepage.php">home</a>
            <a href="../../home-prof/homepage.php">about</a>
            <a href="../services.php">services</a>
            <a href="../../welcome.php">Account</a>
        </nav>
        <div class="fas fa-bars" id="menu"></div>
    </header>

    <section class="appointment-area">
        <div class="appointment-action padtop">
            <h2>Make An Appointment</h2>

            <form method="post" action="">
                <div class="form-group">
                    <input type="text" class="form-control" id="Name" name="Name" placeholder="Name" required>
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="Phone" name="Phone" placeholder="Phone" required>
                </div>

                <div class="form-group">
                    <input type="date" class="form-control" id="datetime_date" name="datetime_date" placeholder="DD/MM/YYYY" required>
                </div>

                <div class="form-group">
                    <input type="time" class="form-control" id="datetime_time" name="datetime_time" placeholder="HH/MM" required>
                </div>

                <div class="form-group">
                    <select class="form-control" id="serviceType" name="serviceType" required>
                        <option style="color: #000000;" value="Type of Service">Type of Service</option>
                        <option value="Health Service">Health Service</option>
                        <option value="Nutrition Service">Nutrition Service</option>
                        <option value="Response Service">Response Service</option>
                        <option value="Testing Service">Testing Service</option>
                        <option value="Weight Service">Weight Service</option>
                        <option value="Clinical Service">Clinical Service</option>
                    </select>
                </div>

                <div class="form-group">
                    <textarea name="Message" class="form-control" id="Message" rows="4" placeholder="Your Message" required></textarea>
                </div>

                <button type="submit" class="default-btn" name="submit">
                    Book Appointment
                </button>
            </form>
        </div>
    </section>

    <script src="script.js"></script>
</body>

</html>
