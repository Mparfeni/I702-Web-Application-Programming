 <header>
      Mark shop
    </header>
<?php
session_start();
if (!array_key_exists("cart", $_SESSION)) {
    $_SESSION["cart"] = array();
}
?>
