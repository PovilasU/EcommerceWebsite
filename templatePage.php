<?php
//session_start();
//Include the PHP functions to be used on the page
include('common.php');

///echo $name;
//Output header and navigation
outputHeader("E-Commerce Website");
?>

    <!--top-header-->
    <div class="top-header">
        <div class="container">
            <div class="top-header-main">

                <div class="col-md-6 top-header-left">
                    <div style="float: right" class="cart box_1">
                        <a href="checkout.html">
                            <div class="total">
                                <span class="simpleCart_total"></span></div>
                            <span class="simpleCart_total"> </span></div>

                            <img src="images/cart-1.png" alt="" />

                        </a>
                        <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>

                    </div>
                    <div style="float: right" class="cart box_1">
                        <p style="color: white"><?php echo "Current User: ".$name; ?></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--End top-header-->

    <!--start-logo-->
    <div class="logo">
        <a href="index.html"><h1>Luxury Watches</h1></a>
    </div>
    <!--End start-logo-->
<?php
outputBannerNavigation("Home");
//outputMainBanner();
?>





<?php
outputMainPanel();
?>
<!--Maint content here-->
<p></p>
<!--End Maint content -->



<?php
//output information bar
outputInformation();
outputFooter();
?>