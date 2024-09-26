<?php
session_start();
include_once('../includes/config.php');
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Services</title>
</head>

<body>

    <!-- header section starts -->
    <header class="header">
        <a href="#" class="logo"> FitCare </a>
        <nav class="navbar">
            <a href="../index.html">home</a>
            <a href="../index.html">about</a>
            <a href="">services</a>
            <a href="../profile.php">Account</a>
        </nav>
        <div class="fas fa-bars" id="menu"></div>
    </header>
    <!-- header section ends -->
    <!-- Start What We Offer Area -->
    <section class="what-we-offer-area">
        <div class="container">
            <div class="section-title">
                <span>What We Offer</span>
                <h2>Our Diet & Health Check-Up Services</h2>
            </div>

            <div class="row">
                <div class="single-what-we-offer">
                    <a href="">
                        <img src="service-1.jpg" alt="Image">
                    </a>
                    <div class="what-we-offer-content">
                        <h3>
                            <a href="">Self BMI Calculation</a>
                        </h3>
                        <p>Understanding your Body Mass Index (BMI) is a crucial step in assessing your body composition
                            and overall health.</p>
                        <a href="bmi-cal/indexbmi.php" class="read-more">Calculate BMI</a>
                    </div>
                </div>

                <div class="single-what-we-offer">
                    <a href="">
                        <img src="service-2.jpg" alt="Image">
                    </a>
                    <div class="what-we-offer-content">
                        <h3>
                            <a href="">Connect with Our Experts</a>
                        </h3>
                        <p>Feeling lost in a sea of conflicting health advice? Let our experts be your compass. Book an
                            appointment with our experts today.</p>
                        <a href="makeappoinment/appo.php" class="read-more">Add Appoinment</a>
                    </div>
                </div>

                <div class="single-what-we-offer">
                    <a href="">
                        <img src="service-3.jpg" alt="Image">
                    </a>
                    <div class="what-we-offer-content">
                        <h3>
                            <a href=""> Health Track Dashboard</a>
                        </h3>
                        <p>Customize your goals, track your progress, and celebrate your achievements with our
                            user-friendly tracking platform.</p>
                        <a href="health-tracker/health.php" class="read-more">Track Progress</a>
                    </div>
                </div>

                <div class="single-what-we-offer">
                    <a href="">
                        <img src="service-4.jpg" alt="Image">
                    </a>
                    <div class="what-we-offer-content">
                        <h3>
                            <a href="../our Experts/Index.html">Our Experts Profiles</a>
                        </h3>
                        <p>Our diverse team of specialists is dedicated to guiding your personalized health journey with expertise and care.</p>
                        <a href="Experts/Index.html" class="read-more">View Profiles</a>
                    </div>
                </div>

                <div class="single-what-we-offer">
                    <a href="">
                        <img src="service-5.jpg" alt="Image">
                    </a>
                    <div class="what-we-offer-content">
                        <h3>
                            <a href="">Smart Cart</a>
                        </h3>
                        <p>Boost your gains with our creamy, gourmet smoothies crafted to satisfy your cravings. Grab a nutrient-pack</p>
                        <a href="../carts/cart.php" class="read-more">My Cart</a>
                    </div>
                </div>

                <div class="single-what-we-offer">
                    <a href="">
                        <img src="service-6.jpg" alt="Image">
                    </a>
                    <div class="what-we-offer-content">
                        <h3>
                            <a href="">Weight Loss Program</a>
                        </h3>
                        <p>No more fad diets or quick fixes. Our sustainable weight loss program is designed for
                            long-term success.</p>
                        <a href="" class="read-more">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="script.js"></script>
</body>

</html>