<?php
session_start();
require 'connect.php';
require 'current_user.php';
$collection = $db->orders;
$cursor = $collection->find();
$array = iterator_to_array($cursor);
?>


<html>
<head>
    <title>Purchase history</title>

</head>
<body>

<!-- Navigation section -->
<div class="navigation">
    <a class="selected" href="index.php">Home</a>
    <a href="shop.php">Shop</a>
    <a href="cart.php">Cart</a>
    <a href="registration.php">Registration</a>
    <a href="admin.php">Admin</a>
    <a href="purchase-history-old.php">Purchase history</a>
    <a href="login.php">Login</a>
    <a href="logout.php?action=logout">Logout</a>
</div>

<!-- Contents of the page -->
<h1>Your purchase history</h1>
<?php
foreach ($cursor as $product){
    $date = $product["dateAdded"];
    //$phpDate = $product["dateAdded"]->toDateTime();
    //  $phpDate->format('M-d-Y');
    //echo date(DATE_ISO8601, $product["dateAdded"]->sec);
    // echo "test test date!" . $phpDate;
 //   echo "User: ". $product["username"]."<br>";
    echo "Oder ";
    echo "date: ".date('d/M/Y  h:m:s',$date->sec)."<br>";
    //  echo "Item name ". "<br>"; //. " Price "." Quantity "."<br>";
    ?>


    <?php

    foreach ($product["0"] as $orderItem ){
        echo  "Item name: ". $orderItem["name"]."";
        echo ", Price: £".$orderItem["price"]."";
        echo  ", Quantity: " .$orderItem["quantity"]." ";
        echo "<br>";
        ?>



    <?php }
    echo "Total paid: £". $product["totalPay"]."<br>"."<br>";
}
?>



</body>
</html>