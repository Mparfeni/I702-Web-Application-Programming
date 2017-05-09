<?php
include('session.php');
?>
<?php
include_once("config.php");
if (session_id() === "") {
   session_start();
}
$connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if(isset($_POST["add_to_cart"]))
{
		if(isset($_SESSION["shopping_cart"]))
		{
				 $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
				 if(!in_array($_GET["id"], $item_array_id))
				 {
							$count = count($_SESSION["shopping_cart"]);
							$item_array = array(
									 'item_id'               =>     $_GET["id"],
									 'item_name'               =>     $_POST["hidden_name"],
									 'item_price'          =>     $_POST["hidden_price"],
									 'item_quantity'          =>     $_POST["quantity"]
							);
							$_SESSION["shopping_cart"][$count] = $item_array;
				 }
				 else
				 {
							echo '<script>alert("Item Already Added")</script>';
							echo '<script>window.location="products.php"</script>';
				 }
		}
		else
		{
				 $item_array = array(
							'item_id'               =>     $_GET["id"],
							'item_name'               =>     $_POST["hidden_name"],
							'item_price'          =>     $_POST["hidden_price"],
							'item_quantity'          =>     $_POST["quantity"]
				 );
				 $_SESSION["shopping_cart"][0] = $item_array;
		}
}
?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title>Mark's shop</title>
	<link rel="stylesheet" href="css/styles.css" type="text/css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css">

	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<div id="wrapper">
		<header>
			<form name="cart">
				<a href="cart.php"><img src="images/cart.png" width="45" height="45" alt="Cart logo"></a>
			</form>
			<a href="/"><img src="images/logo.png" alt="Mark's shop logo"></a>
		</header>
		<nav>
			<ul class="top-menu">
				<?php include "navbar.php"; ?>
			</ul></nav>
		<div id="heading">
				<h2>PRODUCTS</h2>
		</div>
		<aside>
      <nav>
        <ul class="aside-menu">
          <li><a href="profile.php">WELCOME</a></li>
		      <li><a href="changepassword">PASSWORD RECOVERING</a></li>
          <li><a href="logout.php">LOGOUT</a></li>
        </ul>
      </nav>
    </aside>
		<section>
      <h1>Welcome : <?php echo $login_session; ?></h1>
		</section>
	</div>
	<footer>
		<div id="footer">
			<div id="sitemap">
				<h3>SITEMAP</h3>
				<div>
					<a href="/home/">Home</a>
 		      <a href="/about/">About</a>
 		      <a href="/services/">Services</a>
				</div>
				<div>
					<a href="/partners/">Partners</a>
					<a href="/customers/">Support</a>
					<a href="/contact/">Contact</a>
				</div>
			</div>
			<div id="social">
				<h3>SOCIAL NETWORKS</h3>
				<a href="http://twitter.com/" class="social-icon twitter"></a>
				<a href="http://facebook.com/" class="social-icon facebook"></a>
				<a href="http://plus.google.com/" class="social-icon google-plus"></a>
				<a href="http://vimeo.com/" class="social-icon-small vimeo"></a>
				<a href="http://youtube.com/" class="social-icon-small youtube"></a>
				<a href="http://flickr.com/" class="social-icon-small flickr"></a>
				<a href="http://instagram.com/" class="social-icon-small instagram"></a>
				<a href="/rss/" class="social-icon-small rss"></a>
			</div>
		</div>
		<div id="footer-logo"></div>
	</footer>
</body>
</html>
