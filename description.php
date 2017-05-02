<?php include("connection.php"); ?>
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
			<a href="/"><img src="images/logo.png" alt="Mark's shop logo"></a>
		</header>
		<nav>
			<ul class="top-menu">
				<li><a href="/home/">HOME</a></li>
				<li><a href="index.html">ABOUT US</a></li>
        <li class="active">PRODUCTS</li>
		    <li><a href="/contact/">CONTACT</a></li>
			  <li><a href="login.html">LOGIN</a></li>
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
      <?php
      $statement = $conn->prepare(
        "SELECT `name`, `description`, `price` FROM" .
        " `Mark_shop_product` WHERE `id` = ?");
      $statement->bind_param("i", $_GET["id"]);
      $statement->execute();
      $results = $statement->get_result();
      $row = $results->fetch_assoc();
      ?>
      <span style="float:right;"><?=$row["price"];?>EUR</span>
      <h1><?=$row["name"];?></h1>
      <p>
        <?=$row["description"];?>
      </p>
      <form method="post" action="cart.php">
        <input type="hidden" name="id" value="<?=$_GET["id"];?>"/>
        <input type="submit" value="Add to cart"/>
      </form>
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
	</div>
</footer>
</body>
</html>
