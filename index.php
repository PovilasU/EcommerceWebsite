<?php
//session_start();
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
session_start();
require 'connect.php';
//  require 'current_user.php';
$collection = $db->products;
$cursor = $collection->find();

?>



<!--product-starts-->
<div class="product">
    <div style="margin-top: 80px; margin-bottom: 80px" class="container">
        <div class="product-one">
            <?php foreach ($cursor as $product) {?>
                <?php $imageName='p-1.png' ?>


                <div style="margin-top: 20px" class="col-md-3 product-left">
                    <div class="product-main ">
                        <a href="#" class="mask"><img class="img-responsive " <?php echo '<img src="images/'.$product["image"].'" alt="">'; ?> </a>
                        <div>Name: <?php echo $product["name"] ; ?></div>
                        <div>Price £:<?php echo $product["price"] ; ?></div>
                        <div>Description:<?php echo $product["description"] ; ?></div>
                        <div><a href="cart.php?_id=<?php echo $product["_id"]; ?>">Order Now</a></div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</div>
<!--product-end-->


<!--End Maint content -->
<?php
//output information bar
outputInformation();
//Output the footer
outputFooter();
?>

