<?php
session_start();
if(isset($_GET["action"]))
{
		if($_GET["action"] == "delete")
		{
				 foreach($_SESSION["shopping_cart"] as $keys => $values)
				 {
							if($values["item_id"] == $_GET["id"])
							{
									 unset($_SESSION["shopping_cart"][$keys]);
									 echo '<script>alert("Item Removed")</script>';
									 echo '<script>window.location="cart.php"</script>';
							}
				 }
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
			<a href="index.php"><img src="images/logo.png" alt="Mark's shop logo"></a>
		</header>
		<nav>
			<ul class="top-menu">
				 <?php include "navbar.php"; ?>
			</ul></nav>
		<div id="heading">
				<h2>Cart</h2>
		</div>
		<div style="clear:both"></div>
		<br />
		<h3>Order Details</h3>
		<div style="margin-bottom: 200px" class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th style="width:40%;">Item Name</th>
          <th style="width:10%;">Quantity</th>
          <th style="width:20%;">Price</th>
          <th style="width:15%;">Total</th>
          <th style="width:5%;">Action</th>
				</tr>
				<?php
				if(!empty($_SESSION["shopping_cart"]))
				{
					$total = 0;
					foreach($_SESSION["shopping_cart"] as $keys => $values)
					{
						?>
						<tr>
							<td><?php echo $values["item_name"]; ?></td>
              <td><?php echo $values["item_quantity"]; ?></td>
              <td>$ <?php echo $values["item_price"]; ?></td>
              <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
              <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
						</tr>
						<?php
						$total = $total + ($values["item_quantity"] * $values["item_price"]);
					}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
            <td align="right">$ <?php echo number_format($total, 2); ?></td>
            <td></td>
					</tr>
					<?php
				}
				?>
			</table>
		</div>
	</div>
	<footer>
		<div id="footer">
			<div id="sitemap">
				<h3>SITEMAP</h3>
				<div>
					<a href="/home/">Home</a>
 		      <a href="index.php">About</a>
				</div>
				<div>
					<a href="products.php">Products</a>
					<a href="loginpage.php">Login</a>
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
