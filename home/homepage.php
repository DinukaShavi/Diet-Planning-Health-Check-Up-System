<?php
session_start();
include_once('../includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitCare - Diet & Health Check-up</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- header section starts -->

    <header class="header">

        <a href="#" class="logo"> FitCare </a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="../login.php" class="btn btn-primary">Login</a>
        </nav>

        <div class="fas fa-bars" id="menu"></div>

    </header>

    <!-- header section ends -->

    <!-- home section starts -->

    <section class="home" id="home">

        <div class="content">
            <h3>welcome to the place full of healthy life</h3>
            <a href="" class="btn">Read More</a>
        </div>

    </section>

    <!-- home section ends -->

    <!-- about section starts -->

    <section class="about" id="about">

        <h1 class="heading">about us</h1>

        <div class="row">

            <div class="content">
                <h3>our mission is to give you a guideline for your health.</h3>
                <p>At FitCare, we believe your health shouldn't be an afterthought, but a vibrant, thriving
                    foundation for everything you do.
                    We're not about fad diets or quick fixes. We're about guiding you towards a sustainable,
                    personalized approach to health, starting with your diet and supported by comprehensive health
                    checkups. Forget restrictive rules and confusing calorie counting. We empower you with knowledge,
                    tools, and expert support to navigate the world of food with confidence, making choices that fuel
                    your body, nourish your mind, and leave you feeling your absolute best.
                    Our customized diet plans are designed to fit your unique needs, preferences, and even cultural
                    nuances. We delve deeper than simply calories, considering your health goals, lifestyle, and any
                    existing medical conditions. And because true health requires a holistic approach, we offer
                    convenient and accessible health checkups to give you a complete picture of your well-being.</p>
                <a href="#" class="btn"> Learn more</a>
            </div>

            <div class="image">
                <img src="images/about.png" alt="">
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- service plans section starts -->

    <section class="services" id="services">

        <h1 class="heading">health plans</h1>

        <div class="box-container">

            <div class="box">

                <div class="icon">
                    <img src="images/service-1.png" alt="">
                </div>
                <div class="content">
                    <h3>Nutritional Harmony Blueprint</h3>
                    <div class="line"></div>
                    <p>Achieve balance with a personalized meal plan, portion control, and ongoing support.</p>
                    <ul>
                        <li><i class="fas fa-check"></i>Dietary Analysis</li>
                        <li><i class="fas fa-check"></i>Balanced Meal Planning</li>
                        <li><i class="fas fa-check"></i>Portion Control Guidance</li>
                        <li><i class="fas fa-check"></i>Ongoing Support and Monitoring</li>
                    </ul>
                </div>

            </div>

            <div class="box">

                <div class="icon">
                    <img src="images/service-2.png" alt="">
                </div>
                <div class="content">
                    <h3>Energize and Revitalize Regimen</h3>
                    <div class="line"></div>
                    <p>Ignite your vitality through a tailored plan, energy assessment, and targeted exercises</p>
                    <ul>
                        <li><i class="fas fa-check"></i> Energy Assessment</li>
                        <li><i class="fas fa-check"></i>Nutrient-Rich Meal Plans</li>
                        <li><i class="fas fa-check"></i>Targeted Exercise Routine</li>
                        <li><i class="fas fa-check"></i>Lifestyle Optimization</li>
                    </ul>
                </div>

            </div>

            <div class="box">

                <div class="icon">
                    <img src="images/service-3.png" alt="">
                </div>
                <div class="content">
                    <h3>Holistic Wellness Program</h3>
                    <div class="line"></div>
                    <p>Transform your well-being with personalized nutrition, fitness, and mindfulness practices.</p>
                    <ul>
                        <li><i class="fas fa-check"></i>Personalized Assessment</li>
                        <li><i class="fas fa-check"></i>Customized Nutrition Plan</li>
                        <li><i class="fas fa-check"></i>Fitness Integration</li>
                        <li><i class="fas fa-check"></i>Mindfulness Practices</li>
                    </ul>
                </div>

            </div>

        </div>

    </section>

    <!-- service plans section ends -->

    <!-- blogs section starts -->

    <section class="diet" id="diet">

        <h1 class="heading">Diet Blog</h1>

        <ul class="controls">
            <li class="buttons active" data-filter="all">
                <img src="images/diet-1.png" alt="">
                <h3>all</h3>
            </li>
            <li class="buttons" data-filter="breakfast">
                <img src="images/diet-2.png" alt="">
                <h3>breakfast</h3>
            </li>
            <li class="buttons" data-filter="lunch">
                <img src="images/diet-3.png" alt="">
                <h3>lunch</h3>
            </li>
            <li class="buttons" data-filter="dinner">
                <img src="images/diet-4.png" alt="">
                <h3>dinner</h3>
            </li>
        </ul>

        <div class="image-container">

            <div class="box lunch">
                <div class="image">
                    <img src="images/diet_blog1.jpg" alt="">
                </div>
                <div class="content">
                    <a href="#" class="link">Wholesome Oatmeal Delight</a>
                    <p>Start your day with oatmeal topped with berries, nuts, and honey. This fiber-rich breakfast provides lasting energy and heart-healthy benefits.</p>
                    <div class="icon">
                        <a href="#"><i class="fas fa-clock"></i> 11 june, 2023</a>
                        <a href="#"><i class="fas fa-user"></i> by admin</a>
                    </div>
                </div>
            </div>

            <div class="box breakfast">
                <div class="image">
                    <img src="images/diet_blog2.jpg" alt="">
                </div>
                <div class="content">
                    <a href="#" class="link">Protein-Packed Avocado Toast</a>
                    <p>Enjoy nutrient-dense breakfast with avocado toast topped with a poached egg. Balanced with healthy fats and protein, keeps you satisfied.</p>
                    <div class="icon">
                        <a href="#"><i class="fas fa-clock"></i> 11 june, 2023</a>
                        <a href="#"><i class="fas fa-user"></i> by admin</a>
                    </div>
                </div>
            </div>

            <div class="box breakfast">
                <div class="image">
                    <img src="images/diet_blog3.jpg" alt="">
                </div>
                <div class="content">
                    <a href="#" class="link">Colorful Quinoa Salad Bowl</a>
                    <p>Elevate lunch with a quinoa salad featuring vegetables, chickpeas, and vinaigrette. This nutrient-packed meal offers protein, fiber.</p>
                    <div class="icon">
                        <a href="#"><i class="fas fa-clock"></i> 11 june, 2023</a>
                        <a href="#"><i class="fas fa-user"></i> by admin</a>
                    </div>
                </div>
            </div>

            <div class="box breakfast">
                <div class="image">
                    <img src="images/diet_blog4.jpg" alt="">
                </div>
                <div class="content">
                    <a href="#" class="link">Greek Yogurt Parfait Meal</a>
                    <p>Create a delicious parfait with Greek yogurt, granola, and fruits. This protein-packed option supports gut health and provides antioxidants.</p>
                    <div class="icon">
                        <a href="#"><i class="fas fa-clock"></i> 11 june, 2023</a>
                        <a href="#"><i class="fas fa-user"></i> by admin</a>
                    </div>
                </div>
            </div>

            <div class="box lunch">
                <div class="image">
                    <img src="images/diet_blog5.jpg" alt="">
                </div>
                <div class="content">
                    <a href="#" class="link">Vegetarian Stir-Fry</a>
                    <p>Create a quick, nutritious dinner with a vegetarian stir-fry. Tofu or tempeh, colorful vegetables, and a soy-ginger sauce make a delicious, plant-based option.</p>
                    <div class="icon">
                        <a href="#"><i class="fas fa-clock"></i> 11 june, 2023</a>
                        <a href="#"><i class="fas fa-user"></i> by admin</a>
                    </div>
                </div>
            </div>

            <div class="box dinner">
                <div class="image">
                    <img src="images/diet_blog6.jpg" alt="">
                </div>
                <div class="content">
                    <a href="#" class="link">Mediterranean Chickpea Stew</a>
                    <p>Delight in a hearty chickpea stew with tomatoes, spinach, and Mediterranean spices. Fiber-rich and full of essential vitamins.</p>
                    <div class="icon">
                        <a href="#"><i class="fas fa-clock"></i> 11 june, 2023</a>
                        <a href="#"><i class="fas fa-user"></i> by admin</a>
                    </div>
                </div>
            </div>

            <div class="box dinner">
                <div class="image">
                    <img src="images/diet_blog7.jpg" alt="">
                </div>
                <div class="content">
                    <a href="#" class="link">Sweet Potato and Black Bean Tacos</a>
                    <p>Enjoy flavorful sweet potato and black bean tacos for a plant-based dinner. Rich in fiber, vitamins, and antioxidants.</p>
                    <div class="icon">
                        <a href="#"><i class="fas fa-clock"></i> 11 june, 2023</a>
                        <a href="#"><i class="fas fa-user"></i> by admin</a>
                    </div>
                </div>
            </div>

            <div class="box dinner">
                <div class="image">
                    <img src="images/diet_blog8.jpg" alt="">
                </div>
                <div class="content">
                    <a href="#" class="link">Grilled Chicken Wrap</a>
                    <p>Satisfy hunger with a grilled chicken wrap loaded with veggies. This balanced meal provides lean protein, and essential vitamins.</p>
                    <div class="icon">
                        <a href="#"><i class="fas fa-clock"></i> 11 june, 2023</a>
                        <a href="#"><i class="fas fa-user"></i> by admin</a>
                    </div>
                </div>
            </div>

            <div class="box dinner">
                <div class="image">
                    <img src="images/diet_blog9.jpg" alt="">
                </div>
                <div class="content">
                    <a href="#" class="link">Salmon with Roasted Vegetables</a>
                    <p>Enjoy baked salmon with roasted vegetables for a heart-healthy dinner. Rich in omega-3s and antioxidants</p>
                    <div class="icon">
                        <a href="#"><i class="fas fa-clock"></i> 11 june, 2023</a>
                        <a href="#"><i class="fas fa-user"></i> by admin</a>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <!-- blogs section ends -->

    <!-- newsletter section starts -->

    <section class="newsletter">

        <div class="content">
            <h1 class="heading">subscribe now</h1>
            <p>Subscribe now to receive timely updates, expert tips, and discover new health plans tailored just for
                you. Stay informed on the latest in wellness and achieve your fitness goals seamlessly</p>
            <form action="">
                <input type="email" placeholder="enter your email" class="email">
                <input type="submit" value="subscribe" class="btn">
            </form>
        </div>

    </section>

    <!-- newsletter section ends -->

    <!-- footer section starts -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>quick links</h3>
                <a href="#home"> <i class="fas fa-arrow-right"></i>home</a>
                <a href="#about"> <i class="fas fa-arrow-right"></i>about</a>
                <a href="#services"> <i class="fas fa-arrow-right"></i>services</a>
                <a href=""> <i class="fas fa-arrow-right"></i>Account</a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href="#"> <i class="fas fa-arrow-right"></i>my account</a>
                <a href="#"> <i class="fas fa-arrow-right"></i>ask questions</a>
                <a href="#"> <i class="fas fa-arrow-right"></i>News</a>
                <a href=""> <i class="fas fa-arrow-right"></i>reviews</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"> <i class="fas fa-phone"></i>079-456-7890</a>
                <a href="#"> <i class="fas fa-phone"></i>079-765-2568</a>
                <a href="#"> <i class="fas fa-envelope"></i>fitcareinfo2023@gmail.com</a>
                <a href="#"> <i class="fas fa-map"></i>28/4B,High Level Road, Nugegoda</a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="#"> <i class="fab fa-facebook-f"></i>facebook</a>
                <a href="#"> <i class="fab fa-instagram"></i>instagram</a>
                <a href="#"> <i class="fab fa-linkedin"></i>linkedin</a>
                <a href="#"> <i class="fab fa-github"></i>github</a>
            </div>

        </div>

        <div class="credit">created by <a href="../Team/team.php"><span>TEAM16</span></a> | all rights are reserved</div>

    </section>
    <script src="script.js"></script>

</body>

</html>