<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <meta name="description" content="Introduction to this guy's website">
    <title>This goes into the titlebar</title>
    <link rel="css/style.css" type="text/css"/>
    <script type="text/javascript" src="js/main.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no"/><!-- Disable zoom on smartphone -->
  </head>
  <body>
<?php
require_once "config.php";
include "header.php";
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error)
  die("Connection to database failed:" .
    $conn->connect_error);
$conn->query("set names utf8"); // Support umlaut characters
?>
    <nav>
      Navigation links go here
    </nav>
    <section>
      Product items go here
      
      <ul>
  <?php
 
    $conn = new mysqli("localhost", "test", "t3st3r123", "test");
    $results = $conn->query(
      "SELECT id,name,price FROM Mark_shop_product;");
 
    while ($row = $results->fetch_assoc()) {
      ?>
        <li>
          <a href="description.php?id=<?=$row['id']?>">
            <?=$row["name"]?></a>
            <?=$row["price"]?>EUR
        </li>
      <?php
    }
 
    $conn->close();
 
  ?>
</ul>
      
      
    </section>
    <article>
      The actual content goes here
    </article>
    <aside>
      Context specific links go here
    </aside>
<?php
include "footer.php" 
?>
  </body>
 
</html>
