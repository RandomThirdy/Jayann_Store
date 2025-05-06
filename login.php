<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $_SESSION['user_id'] = $row['id'];
      echo "<script>alert('Login successful!'); window.location='home.php';</script>";
   }else{
      echo "<script>alert('incorrect username or password!');</script>";
   }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Section</title>

   <link rel="icon" type="image/png" href="images/storenijayann.png">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
   <link rel="stylesheet" href="css/style.css?v=1.0">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="form-container" data-aos="fade-up">

   <form action="" method="post">
      <h3>Login Now</h3>
      <input type="email" name="email" required placeholder="enter your email" class="box" maxlength="200" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="enter your password" class="box" maxlength="200" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="login now" name="submit" class="btn">
      <p>Don't have an account? <a href="register.php">Register Now</a></p>
   
      
   </form>

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