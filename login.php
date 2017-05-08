<?php
include("config.php");
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST["password"];
echo gettype($password);
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password);
// Selecting Database
echo gettype($password);
//$db = mysqli_select_db($connection,"test");
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection,"SELECT * FROM Mark_shop_user where username='$username' AND password='$password'");
$rows = mysqli_num_rows($query);
if ($rows == 1) { // Initializing Session
  $_SESSION['login_user']=$username; // Redirecting To Other Page
  header("location: index.php");
} else {
$error = "Username or Password is invalid";
}
mysqli_close($connection); // Closing Connection
}
?>
