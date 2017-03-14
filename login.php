<?php
// This is login.php, here we check if user provided proper credentials
var_dump($_POST); // This is just to check that the data gets to server
include "config.php";
 
// This is copy-paste from description.php!
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error)
  die("Connection to database failed:" .
    $conn->connect_error);
 
$conn->query("set names utf8");
 
$statement = $conn->prepare(
"SELECT * FROM Mark_shop_user
WHERE email = ? AND password = PASSWORD(?)"); // I PROMISE I WILL NEVER USE THIS IN PRODUCTION
 
$statement->bind_param("ss", $_POST["user"], $_POST["password"]);
$statement->execute();
$results = $statement->get_result();
$row = $results->fetch_assoc();
 
if($row) {
    echo "Login successful, hello " . $row["first_name"];
    $_SESSION["user"] = $row["id"]; // This just stores user row number!
} else {
    echo "Login failed";
}

?>
