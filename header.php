 <header>
      Mark shop
      <a href="http://enos.itcollege.ee/~mparfeni/registration.html">Sign Up</a>
      <a href="http://enos.itcollege.ee/~mparfeni/login.html">Sign In</a>
    </header>
<?php
session_start();
if (!array_key_exists("cart", $_SESSION)) {
    $_SESSION["cart"] = array();
}
?>
