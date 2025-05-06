<!DOCTYPE html>
<html lang="en">


<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         
      </div>
      <script>
         setTimeout(function() {
            var message = document.querySelector(".message");
            if(message) {
               message.remove();
            }
         }, 1500); 
      </script>
      ';
   }
}

?>
<div class="top-bar" data-aos="fade-in">
   <div class="contact-info" data-aos="fade-in">
      <span class="phone"><i class="fas fa-phone-alt" data-aos="fade-in"></i> +9 385 100 460</span>
      <span class="email"><i class="fas fa-envelope" data-aos="fade-in"></i> contact@jayannstore.com</span>
      <span class="social-links">
         <a href="https://www.facebook.com/angelo.decatoria.5" class="social-icon"><i class="fab fa-facebook-f"></i></a>
         <a href="" class="social-icon"><i class="fab fa-twitter"></i></a>
         <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
      </span>
   </div>
</div>
<header class="header">
   <section class="flex">
   <a href="home.php" class="logo">
    <img src="images/storenijayann.png" alt="Jayann store Logo" class="logo-img">
</a>

      <nav class="navbar">
         <a href="home.php">Home</a>
         <a href="about.php">About</a>
         <a href="products.php">Products</a>
         <a href="orders.php">Orders</a>
         <a href="contact.php">Contact</a>
      </nav>

      <div class="icons">
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
         <a href="search.php"><i class="fas fa-search"></i></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_items; ?>)</span></a>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p class="name"><?= $fetch_profile['name']; ?></p>
         <div class="flex">
            <a href="profile.php" class="btn">profile</a>
            <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
         </div>
         <p class="account">
            <a href="login.php">Login</a> or
            <a href="register.php">Register</a>
         </p> 
         <?php
            }else{
         ?>
            <p class="name">Please Login First!</p>
            <a href="login.php" class="btn">Login</a>
         <?php
          }
         ?>
      </div>
   </section>
</header>

</body>
</html>
