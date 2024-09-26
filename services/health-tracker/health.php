<?php
session_start();
include_once('../includes/config.php');
// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get username from session
    $username = $_SESSION['username'];

    // Get input values
    $water = $_POST["water"];
    $exercise = $_POST["exercise"];
    $bloodSugarLevel = $_POST["bloodsugerlevel"];

    // Validate inputs (you can add more validation)
    if (!empty($water) && !empty($exercise) && !empty($bloodSugarLevel)) {
        // Get current date
        $currentDate = date("Y-m-d");

        // Insert data into user's health table using prepared statement
        $sqlInsert = "INSERT INTO `user_health` (username, date, water_intake, exercise_duration, blood_sugar_level) 
                      VALUES (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sqlInsert);
        $stmt->bind_param("sssss", $username, $currentDate, $water, $exercise, $bloodSugarLevel);

        if ($stmt->execute()) {
            // Data insertion successful
            echo "<script>alert('Health data successfully added!');</script>";
        } else {
            // Error in data insertion
            echo "<script>alert('Error adding health data. Please try again later.');</script>";
        }

        $stmt->close();
    } else {
        // Fields not filled
        echo "<script>alert('Please fill in all fields.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style2.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Health-Tracker</title>
</head>

<body>

    <div class="navcontainer">
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
    </div>

    <div class="app-content">
        <div class="app">
            <h1>FitCare</h1>
            <h3>Health Tracker</h3>
            <div class="inputs">
                <div>
                    <label for="water">
                        Water Intake (in ml)
                    </label>
                    <input id="water" type="number" name="water">
                </div>
                <div>
                    <label for="exercise">
                        Exercise Duration (in min)
                    </label>
                    <input id="exercise" type="number" name="exercise">
                </div>
                <div>
                    <label for="bloodsugerlevel">
                        Blood Sugar Level (in mg/dL)
                    </label>
                    <input id="bloodsugerlevel" type="number" name="bloodsugerlevel">
                </div>
            </div>
            <button id="submit" name="submit">Submit</button>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>
