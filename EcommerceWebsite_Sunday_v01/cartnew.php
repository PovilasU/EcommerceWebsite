<?php
//Include the PHP functions to be used on the page
include('common.php');
//Output header and navigation
outputHeader("E-Commerce Website");
outputBannerNavigation("Home");
?>
<?php
outputMainPanel();
?>
<!--Maint content here-->
<?php
outputCart();
?>


    <table cellspacing="2" cellpadding="2" border="1">
        <tr>
            <th>Option</th>
            <th>_Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Sub Total</th>
        </tr>
        <?php
        $cart = unserialize(serialize($_SESSION['cart']));
        $s = 0;
        $index = 0;
        for($i=0; $i<count($cart); $i++){
            $s += $cart[$i]->price * $cart[$i]->quantity;
            ?>
            <tr>
                <td><a href="cart.php?index=<?php echo $index; ?>" onClick="return confirm ('Are you sure?')">Delete</a></td>
                <td><?php echo $cart[$i]->_id; ?></td>
                <td><?php echo $cart[$i]->name; ?></td>
                <td><?php echo $cart[$i]->price; ?></td>
                <td><?php echo $cart[$i]->quantity; ?></td>
                <td><?php echo $cart[$i]->price * $cart[$i]->quantity; ?></td>
            </tr>
            <?php
            $index++;
        }
        ?>

        <!-- Navigation section -->
        <div class="navigation">
            <a class="selected" href="index_version_02.php">Home</a>
            <a href="shop.php">Shop</a>
            <a href="cart.php">Cart</a>
            <a href="registration.php">Registration</a>
            <a href="login.php">Login</a>
            <a href="logout.php?action=logout">Logout</a>
        </div>

        <tr>
            <td colspan="5" align="right">Sum</td>
            <td align="left"> <?php echo $s; ?> </td>
            <?php
            $_SESSION['sum']= $s;
            ?>
        </tr>
    </table>

    <!--Pay form-->
    <form action="pay-card.php" method="post">
        <td><input type="submit" name="bttPay" value="Pay"></td>
    </form>

    <br>

    <br>
    <a href="index_version_02.php">Continue Shopping</a>


<!--End Maint content here-->

<?php
outputPayButton();
?>

<?php
outputSideBarPart1();
?>
<!--Side Bar here-->
    <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading" >Lorem ipsum</h4>
        <p class="list-group-item-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electron</p>
    </a>
    <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading" >Lorem ipsum</h4>
    <p class="list-group-item-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electron</p>
    </a>


<!--End side bar-->
<?php
outputSideBarPart2();

?>
<?php
//Output the footer
outputFooterPart1();
?>

<?php
outputFooterPart2();
?>