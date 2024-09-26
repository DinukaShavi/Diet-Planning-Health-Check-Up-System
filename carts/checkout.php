<?php
include_once 'config.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `orders`(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='products.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <style>

@import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap");


:root {
    --main-color: #29d978;
    --primary: #f0fff7;
    --black: #141414;
    --white: #fff;
    --bg: #f2f2f2;
    --light-black: #666;
}

* {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
    text-transform: capitalize;
    transition: .2s linear;
}

html {
    font-size: 62.5%;
    overflow-x: hidden;
    scroll-behavior: smooth;
    scroll-padding-top: 6rem;
}

html::-webkit-scrollbar {
    width: 1rem;
}

html::-webkit-scrollbar-track {
    background: var(--white);
}

html::-webkit-scrollbar-thumb {
    background: var(--main-color);
}

.btn {
    display: inline-block;
    margin-top: 1rem;
    padding: 1rem 3rem;
    border: .1rem solid var(--main-color);
    border-radius: 1rem solid;
    cursor: pointer;
    font-size: 1.7rem;
    color: white;
}

.btn:hover {
    background: var(--main-color);
    color: var(--white);
}

.btn:hover {
    background: var(--main-color);
    color: var(--white);
}

.header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 2rem 9%;
    background: var(--primary);
    box-shadow: 0 .5rem 1rem rgba(0, 0, 0, 0.1);
}

.header .logo {
    font-size: 2.2rem;
    font-weight: bolder;
    color: var(--main-color);
}

.header .navbar a {
    font-size: 1.7rem;
    margin-left: 2rem;
    color: var(--black);
}

.header .navbar a:hover {
    color: var(--main-color);
}
   </style>
</head>
<body>

<header class="header">

<a href="#" class="logo"> FitCare </a>

<nav class="navbar">
    <a href="products.php">view products</a>
</nav>

</header>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : $<?= $grand_total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text"  name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number"  name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email"  name="email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>cash on devlivery</option>
               <option value="credit cart">credit cart</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" name="flat" required>
         </div>
         <div class="inputBox">
            <span>address line 2</span>
            <input type="text"  name="street" required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text"  name="city" required>
         </div>
         <div class="inputBox">
            <span>state</span>
            <input type="text" name="state" required>
         </div>
         <div class="inputBox">
            <span>country</span>
            <input type="text"  name="country" required>
         </div>
         <div class="inputBox">
            <span>Zip</span>
            <input type="text"  name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>   
<script src="js/script.js"></script>
</body>
</html>