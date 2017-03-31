<?php
require 'connect.php';
//require "current_user.php";
Session_start();
session_destroy();
?>

    <!-- Navigation section -->
    <div class="navigation">
        <a class="selected" href="index.php">Home</a>
        <a href="shop.php">Shop</a>
        <a href="cart.php">Cart</a>
        <a href="registration.php">Registration</a>
        <a href="login.php">Login</a>
        <a href="logout.php?action=logout">Logout</a>
    </div>


<?php
//echo '<br><a href="login.php?action=logout">Logout</a> ';
echo "See you later!";
header("Location: index.php");


 ?>