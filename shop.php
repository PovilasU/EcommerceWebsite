<?php
session_start();
require 'connect.php';
require 'current_user.php';
$collection = $db->products;
  // echo "Collection selected succsessfully"."<br>";

$cursor = $collection->find();

   foreach ($cursor as $document) {
       echo "Name: ".$document["name"] . "\n" ."<br>";
       echo "Price £: ". $document["price"] . "\n"."<br>";
       echo "Quantity: ".$document["quantity"] . "\n"."<br>";
       echo "Description: ".$document["description"] . "\n"."<br>";
       echo "<br>";
   }

?>
<html>
<body>
<!-- Navigation section -->
<div class="navigation">
    <a class="selected" href="index.php">Home</a>
    <a href="shop.php">Shop</a>
    <a href="cart.php">Cart</a>
    <a href="registration.php">Registration</a>
    <a href="login.php">Login</a>
    <a href="logout.php?action=logout">Logout</a>
</div>
</body>
</html>


  




