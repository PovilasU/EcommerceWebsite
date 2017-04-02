

<?php
echo 'Ecommerce Website';
//Include the PHP functions to be used on the page
include('common.php');
//Output header and navigation
outputHeader("E-Commerce Website");
outputTopHeader();
outputBannerNavigation("Home");

outputMainBanner();
?>

<!--Maint content here-->
<?php
//Start session management
session_start();

//if( array_key_exists("loggedInUserEmail", $_SESSION) )

//Find out if session exists
if( array_key_exists("loggedInUserEmail", $_SESSION) && !empty($_SESSION['loggedInUserEmail'])){
   // echo 'Session in progress. username=' . $_SESSION["username"] ."</br>";
    if ( !isset( $_SESSION['count'] ) )
        $_SESSION['count'] = 1;
    else $_SESSION['count']++;

    
    //This prevents message "hello" pop up every time same user reloads the home page
    if ( $_SESSION['count'] == 1)
    echo '<script type="text/javascript">alert(hello);</script>';

}
else{
    echo 'Session not started';
    header("Location: login.php");
}


if(array_key_exists('loggedInUserEmail',$_SESSION) && empty($_SESSION['loggedInUserEmail'])) {
    echo 'You are not loged in, please register first or login';
    header("Location: login.php");
}
//Output result
echo 'Session started.' ."</br>";
echo 'Information about customer' ."</br>";
echo '<p id="Customer"></p>';
echo 'User Name=' . $_SESSION["name"]."</br>";
echo 'User Email: ' . $_SESSION["loggedInUserEmail"]."</br>";
echo 'User ID=' . $_SESSION["_id"]."</br>";



?>

<?php

require 'connect.php';

//Find all products
$products = $db->products->find();
?>


<p id="prettyDate"></p>
<!--product-starts-->
<div class="product">
    <div style="margin-top: 80px; margin-bottom: 80px" class="container">
        <div class="product-one">

            <?php foreach ($products as $document) {?>

<!--                --><?php //$imageName='p-1.png' ?>


                <div style="margin-top: 20px" class="col-md-3 product-left">

                    <div class="product-main ">
                        <a href="#" class="mask"><img class="img-responsive " <?php echo '<img src="images/'.$document["image"].'" alt="">'; ?> </a>
                        <div>Name: <?php echo $document["name"] ; ?></div>
                        <div>Price £:<?php echo $document["price"] ; ?></div>
                        <div>Rating: <?php echo $document["rating"] ; ?></div>
                        <div>Quantity: <?php echo $document["quantity"] ; ?></div>
                        <div>Description:<?php echo $document["description"] ; ?></div>
                        <div><a href="cart.php?_id=<?php echo $document["_id"]; ?>">Order Now</a></div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</div>
<!--product-end-->
<

<!--End Maint content -->
<?php
//Close the connection
$mongoClient->close();
//output information bar
outputInformation();
//Output the footer
outputFooter();
?>

