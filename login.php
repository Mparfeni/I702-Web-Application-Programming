<?php
   include("config.php");
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $email = mysqli_real_escape_string($db,$_POST['email']);
      $password = mysqli_real_escape_string($db,$_POST['password']);
      $sql = "SELECT * FROM Mark_shop_user WHERE email = '$email' and password = 'PASSWORD($password)'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
         session_register("email");
         $_SESSION['login_user'] = $email;
         header("welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
