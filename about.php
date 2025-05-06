<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us Section</title>

   <link rel="icon" type="images/png" href="images/storenijayann.png">

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   

<?php include 'components/user_header.php'; ?>


<section class="about" data-aos="fade-up">

   <div class="row" data-aos="fade-up">

      <div class="image" data-aos="fade-up">
         <img src="images/storenijayann.png" alt="">
      </div>

      <div class="content" data-aos="fade-up">
         <h3>why choose us?</h3>
         <p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jayann's Store brings everyday essentials to your doorstep—quickly, affordably, and conveniently. Shop with us to enjoy great products, personalized service, and the satisfaction of supporting a local business that cares about its community.</p>         <a href="products.php" class="btn">our product</a>
      </div>

   </div>

</section>


<section class="steps" data-aos="fade-up">

   <h1 class="title">Steps to Avail Products From Jayann's Store</h1>

   <div class="box-container" data-aos="fade-up">

      <div class="box" data-aos="fade-up">
         <img src="images/order.png" alt="">
         <h3>Browse Our Website</h3>
         <p>Explore a wide range of products tailored to your needs on our user-friendly website.</p>
      </div>

      <div class="box" data-aos="fade-up">
         <img src="images/paymentss.png" alt="">
         <h3>Add to Cart and Pay</h3>
         <p>Select your desired items, add them to your cart, and proceed with secure payment options.</p>
      </div>

      <div class="box" data-aos="fade-up">
         <img src="images/grocery-cart.png" alt="">
         <h3>Receive Your Order</h3>
         <p>Relax as we deliver your order promptly to your doorstep.</p>
      </div>

   </div>

</section>




<?php include 'components/footer.php'; ?>


<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script>
AOS.init({
      duration: 1000,  
      once: true,      
   });
</script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>



</body>
</html>