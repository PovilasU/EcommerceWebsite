<?php
session_start();
require 'connect.php';
require 'current_user.php';
$collection = $db->orders;
$cursor = $collection->find();
$array = iterator_to_array($cursor);
//print_r($array);
echo '<pre>'; print_r($array); echo '</pre>';


foreach ($cursor as $product){
    //$phpDate = $product["dateAdded"]->toDateTime();
  //  $phpDate->format('M-d-Y');
   echo date(DATE_ISO8601, $product["dateAdded"]->sec);
   // echo "test test date!" . $phpDate;
    echo $product["username"]."<br>";
    echo $product["dateAdded"]."<br>";
foreach ($product["0"] as $orderItem ){
    echo $orderItem["name"]."<br>";
    echo $orderItem["price"]."<br>";
    echo $orderItem["quantity"]."<br>";
}
    echo $product["totalPay"]."<br>";


}



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
<h1>This is the Shopping website home page</h1>

<!--Items table-->
<table cellpadding="2" cellspacing="2" border="1">

    <tr id="user">
        <th>username</th>
        <th>date added</th>
        <th>Total payed £</th>

    </tr>


    <?php foreach ($cursor as $product)    {
        $date = $product["dateAdded"];
        ?>

        <tr id="user">
            <td><?php echo $product["username"] ; ?></td>
            <td><?php  echo date('d/M/Y  h:m:s',$date->sec); ?></td>
            <td><?php echo $product["totalPay"] ; ?></td>
        </tr id="user">

        <table cellpadding="2" cellspacing="2" border="1">
            <tr id="item">
                <th>Item name</th>
                <th>price £</th>
                <th>quantity</th>
            </tr>

            <?php foreach ($product["0"] as $oderItem) {?>
                <tr id="item">
                    <td><?php echo $oderItem["name"] ; ?></td>
                    <td><?php echo $oderItem["price"] ; ?></td>
                    <td><?php echo $oderItem["quantity"] ; ?></td>

                </tr>


            <?php } ?>
        </table>



    <?php } ?>

</table>

<!--<!--Items table-->-->
<!--<table cellpadding="2" cellspacing="2" border="1">-->
<!--    <tr id="item">-->
<!--        <th>Item name</th>-->
<!--        <th>price £</th>-->
<!--        <th>quantity</th>-->
<!--    </tr>-->
<!---->
<!--    --><?php //foreach ($product["0"] as $oderItem) {?>
<!--        <tr id="item">-->
<!--            <td>--><?php //echo $oderItem["name"] ; ?><!--</td>-->
<!--            <td>--><?php //echo $oderItem["price"] ; ?><!--</td>-->
<!--            <td>--><?php //echo $oderItem["quantity"] ; ?><!--</td>-->
<!---->
<!--        </tr>-->
<!---->
<!---->
<!--    --><?php //} ?>
<!--    </table>-->



</body>
</html>