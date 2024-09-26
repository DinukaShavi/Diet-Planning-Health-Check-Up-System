<?php
session_start();
include_once('../includes/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Height = $_POST['height'];
    $Weight = $_POST['weight'];

    if ($Height == '' || $Weight == '') {
        echo '<script>alert("The input values are required.");</script>';
    } elseif (!is_numeric($Height) || !is_numeric($Weight)) {
        echo '<script>alert("The input value must be a number only.");</script>';
    } else {
        $HeightInCm = floatval($Height);
        $WeightInKg = floatval($Weight);

        $BMIIndex = round($WeightInKg / (($HeightInCm / 100) * ($HeightInCm / 100)), 2);

        if ($BMIIndex < 18.5) {
            $Message = "Underweight";
        } elseif ($BMIIndex <= 24.9) {
            $Message = "Normal";
        } elseif ($BMIIndex <= 29.9) {
            $Message = "Overweight";
        } else {
            $Message = "Obese";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .result-container {
            margin-top: 20px;
        }
    </style>
    <title>BMI Calculator</title>
</head>

<body>

    <!-- header section starts -->
    <header class="header">
        <a href="#" class="logo"> FitCare </a>
        <nav class="navbar">
            <a href="../../index.php">home</a>
            <a href="../../index.php">about</a>
            <a href="../services.php">services</a>
            <a href="#">Account</a>
            <a href="../../login.php" class="btn btn-primary">Login</a>
        </nav>
        <div class="fas fa-bars" id="menu"></div>
    </header>
    <!-- header section ends -->

    <section class="back-img">
        <div class="container">
            <form class="calculate-form" method="post" action="">
                <h3>Calculate Your BMI</h3>
                <div class="form-group">
                    <label>Height / cm</label>
                    <input type="text" class="form-control" name="height">
                    <label>Weight / kg</label>
                    <input type="text" class="form-control" name="weight">
                </div>
                <button type="submit" class="default-btn">
                    Calculate
                </button>

                <?php if (isset($BMIIndex) && is_numeric($BMIIndex)) { ?>
                    <!-- Result -->
                    <div class="result-container"  style="margin-top: 20px;">
                        <input id="Result" name="Result" class="form-control form-control-custom" value="<?php echo $BMIIndex . ' ' . $Message; ?>" readonly>
                    </div>
                <?php } ?>
            </form>
        </div>
    </section>

    <script src="script.js"></script>
</body>

</html>
