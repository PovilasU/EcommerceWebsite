<?php
require 'connect.php';
session_start();

echo 'Welcome '.$_SESSION['username']."<br>";
echo 'Id  '.$_SESSION['_id']."<br>";
echo 'Balance: £'.$_SESSION['balance']."<br>";
//echo '<br><a href="index.php?action=logout">Logout</a> ';
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

