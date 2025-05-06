<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

// Fetch the user profile
$select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$select_profile->execute([$user_id]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Profile Section</title>

   <link rel="icon" type="image/png" href="images/storenijayann.png">
      
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
   <link rel="stylesheet" href="css/style.css?v=1.0">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="user-details" data-aos="fade-up">

   <div class="user" data-aos="fade-up">
      <img src="images/user-icon.png" alt="">
      <p><i class="fas fa-user"></i><span><?= $fetch_profile['name']; ?></span></p>
      <p><i class="fas fa-phone"></i><span><?= $fetch_profile['number']; ?></span></p>
      <p><i class="fas fa-envelope"></i><span><?= $fetch_profile['email']; ?></span></p>
      <a href="update_profile.php" class="btn">Update Info</a>

      <p class="address" data-aos="fade-up"><i class="fas fa-map-marker-alt"></i>
         <span>
            <?php 
               if($fetch_profile['address'] == '') {
                  echo 'Please enter your address.';
               } else {
                  echo nl2br($fetch_profile['address']);
               }
            ?>
         </span>
      </p>
      <a href="update_address.php" class="btn" data-aos="fade-up">Update Address</a>
   </div>

</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script>
 AOS.init({
      duration: 1000,  
      once: true,      
   });
</script>



</body>
</html>
