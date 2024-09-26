<?php
include_once 'config.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
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

#menu {
    font-size: 2.5rem;
    cursor: pointer;
    color: var(--main-color);
    display: none;
}
   </style>
</head>
<body>

<header class="header">

<a href="#" class="logo"> FitCare </a>

<nav class="navbar">
<?php     
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);
      ?>
      <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>
</nav>

</header>

<div class="container">

<section class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <div class="price">Rs.<?php echo $fetch_product['price']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>

</body>
</html>