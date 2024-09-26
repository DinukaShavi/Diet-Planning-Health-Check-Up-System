<?php
session_start();
include_once('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panel</title>
    <style>

header{
   font-family: 'Poppins', sans-serif;
   border:none;
   text-decoration: none;
   text-transform: capitalize;
}
        *,
        *::before,
*::after {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: sans-serif;
}

ol li{
    list-style: none;
}

.row {
  display: flex;
}

a{
  color: #fff;
}

.col-xl-4 {
  flex: 0 0 auto;
  width: 33.33333333%;
}

.header{
   background-color: #3498db;
   position: sticky;
   top:0; left:0;
   z-index: 1000;
}

.header .flex{
   display: flex;
   align-items: center;
   padding:1.5rem 2rem;
   max-width: 1200px;
   margin:0 auto;
}

.header .flex .logo{
   margin-right: auto;
   font-size: 1.7rem;
   color:#fff;
}

.header .flex .logo:hover{
   color:rgba(255, 255, 255, 0.5);
   transition: color 0.15s ease-in-out;
}

.header .flex .navbar a{
   margin-left: 2rem;
   color:#fff;
}

.card {
  display: flex;
  position: relative;
  display: flex;
  flex-direction: column;
  background-color: #fff;
  margin: 4rem 1rem;
  border-radius: 0.25rem;
  background-color: rgba(13, 110, 253, 1);
  color: rgba(255, 255, 255, 1);
  padding: 1.5rem 0.5rem;
}

.card-body {
  flex: 1 1 auto;
  padding: 1rem 1rem;
}

.card-header {
  padding: 0.5rem 1rem;
  margin-bottom: 0;
  background-color: rgba(0, 0, 0, 0.03);
  border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}

.card-footer {
  padding: 1rem 1rem;
  background-color: rgba(0, 0, 0, 0.03);
  border-top: 1px solid rgba(0, 0, 0, 0.125);
  align-items:center; 
  color: rgba(255, 255, 255, 1);
}


    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body>
<header class="header" style="background-color: #212529;">

<div class="flex">

   <a href="home/homepage.php" class="logo">Home Page</a>

   <nav class="navbar">
      <a href=""></a>
      <a href=""></a>
   </nav>

</div>

</header>
    <main>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">Not Registers</div>
                        <div>
                            <a class="card-footer" href="signup.php">Signup Here</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">Already Registered</div>
                        <div>
                            <a class="card-footer" href="login.php">Login Here</a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">Admin Panel</div>
                        <div>
                            <a class="card-footer" href="admin">Login Here</a>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</body>

</html> 