<?php
include('login.php');
if(isset($_SESSION['login_user'])){
 ?>
 <li><a href="/home/">HOME</a></li>
 <li><a href="index.php">ABOUT US</a></li>
 <li><a href="products.php">PRODUCTS</a></li>
 <li><a href="/contact/">CONTACT</a></li>
 <li><a href="profile.php"><?php echo $_SESSION['login_user']; ?></a></li>
 <?php
      } else {?>
  <li><a href="/home/">HOME</a></li>
  <li><a href="index.php">ABOUT US</a></li>
  <li><a href="products.php">PRODUCTS</a></li>
  <li><a href="/contact/">CONTACT</a></li>
  <li><a href="loginpage.php">LOGIN</a></li>
<?php
}
?>
