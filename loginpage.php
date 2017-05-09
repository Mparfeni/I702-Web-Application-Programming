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
				<h2>Login</h2>
		</div>
		<aside></aside>
		<div class="form">

		      <ul class="tab-group">
		        <li class="tab active"><a href="#signup">Sign Up</a></li>
		        <li class="tab"><a href="#login">Log In</a></li>
		      </ul>

		      <div class="tab-content">
		        <div id="signup">
		          <h1>Sign Up for Free</h1>

		          <form action="submission.php" method="post">

		          <div class="top-row">
		            <div class="field-wrap">
		              <label>
		                First Name<span class="req">*</span>
		              </label>
		              <input type="text" name='first_name' required autocomplete="off" />
		            </div>

		            <div class="field-wrap">
		              <label>
		                Last Name<span class="req">*</span>
		              </label>
		              <input type="text" name='last_name' required autocomplete="off"/>
		            </div>
		          </div>

		          <div class="field-wrap">
		            <label>
		              Username<span class="req">*</span>
		            </label>
		            <input type="text" name='username' required autocomplete="off"/>
		          </div>

		          <div class="field-wrap">
		            <label>
		              Set A Password<span class="req">*</span>
		            </label>
		            <input type="password" name='password' required autocomplete="off"/>
		          </div>

		          <button type="submit" class="button button-block">Get Started</button>

		          </form>

		        </div>

		        <div id="login">
		          <h1>Welcome Back!</h1>

		          <form name="login" action="login.php" onsubmit="return validateForm()" method="POST">

		            <div class="field-wrap">
		            <label>
		              Username<span class="req">*</span>
		            </label>
		            <input type="text" name='username' required autocomplete="off"/>
		          </div>

		          <div class="field-wrap">
		            <label>
		              Password<span class="req">*</span>
		            </label>
		            <input type="password" name='password'/>
		          </div>

		          <p class="forgot"><a href="#">Forgot Password?</a></p>

		          <button type="submit" class="button button-block">Log In</button>

		          </form>

		        </div>

		      </div><!-- tab-content -->

		</div> <!-- /form -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src='js/login.js'></script>
		<script src='js/checkinput.js'></script>
		<div class="hFooter"></div>
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
