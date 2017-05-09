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
          <li class="active">LAPTOPS</li>
          <li><a href="/donec/">SMARTPHONES</a></li>
		      <li><a href="/vestibulum/">GAMECONSOLES</a></li>
          <li><a href="/phasellus/">DRONES</a></li>
          <li><a href="/cras/">OTHER</a></li>
        </ul>
      </nav>
    </aside>
		<section>
			<br />
			<div class="container" style="width:600px;">
				<?php
				$query = "SELECT * FROM Mark_shop_product ORDER BY id ASC";
				$result = mysqli_query($connection, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
						?>
						<div class="col-md-4">
							<form method="post" action="products.php?action=add&id=<?php echo $row["id"]; ?>">
								<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
									<img src="<?php echo $row["picture"]; ?>" width="500" height="380" alt="Product photo" class="img-responsive" /><br />
									<h4 class="text-info"><?php echo $row["name"]; ?></h4>
									<h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>
  								<input type="text" name="quantity" class="form-control" value="1" />
									<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
									<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
									<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
								</div>
							</form>
						</div>
						<?php
					}
				}
				?>
			</div>
			<br />
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
