<?php
include("config.php");
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
// Selecting Database
$db = mysqli_select_db($connection,"test");
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection,"select username from Mark_shop_user where username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('index.php'); // Redirecting To Home Page
}
?>
