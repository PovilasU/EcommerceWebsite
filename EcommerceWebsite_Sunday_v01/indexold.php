<?php
session_start();
require 'connect.php';
require 'current_user.php';
$collection = $db->products;
$cursor = $collection->find();

?>
<html>
<head>
    <title>Simple PHP Example - SHOPPING PAGE</title>

</head>
<body>

<!-- Navigation section -->
<div class="navigation">
    <a class="selected" href="index_version_02.php">Home</a>
    <a href="shop.php">Shop</a>
    <a href="cart.php">Cart</a>
    <a href="registration.php">Registration</a>
    <a href="admin-panel.php">Admin</a>
    <a href="purchase-history.php">Purchase history</a>
    <a href="login.php">Login</a>
    <a href="logout.php?action=logout">Logout</a>
</div>

<!-- Contents of the page -->
<h1>This is the Shopping website home page</h1>

<!--Items table-->
<table cellpadding="2" cellspacing="2" border="1">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price £</th>
<!--        <th>Description</th>-->
        <th>Buy</th>
    </tr>

    <?php foreach ($cursor as $product) {?>

        <tr>
            <td><?php echo $product["_id"] ; ?></td>
            <td><?php echo $product["name"] ; ?></td>
            <td><?php echo $product["price"] ; ?></td>
<!--            <td>--><?php //echo $product["quantity"] ; ?><!--</td>-->
<!--            <td>--><?php //echo $product["description"] ; ?><!--</td>-->
            <td><a href="cart.php?_id=<?php echo $product["_id"]; ?>">Order Now</a> </td>
        </tr>

    <?php } ?>

</table>

</body>
</html>