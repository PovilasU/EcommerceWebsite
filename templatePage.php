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
                    <div class="cart box_1">
                        <a href="checkout.html">
                            <div class="total">
                                <span class="simpleCart_total"></span></div>
                            <span class="simpleCart_total"> </span></div>

                            <img src="images/cart-1.png" alt="" />

                        </a>
                        <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>



                    </div>

                    <div class="cart box_1">

                        <p style="color: white"><?php echo "Current User: ".$name; ?></p>
                    </div>

                </div>
                <div class="clearfix"></div>
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
outputMainBanner();
?>
<?php
outputMainPanel();
?>
<!--Maint content here-->

    <div class="panel-body">
        <div class="page-header">
            <h3>This is page template <small></small> </h3>
        </div>
<!--        <img  class="featuredImg" src="images/bnr-1.jpg"  width="100%" alt="">-->
<!--        <p>Paragraph</p>-->
<!--        <h4>A heading</h4>-->
<!--       <p>paragraph</p>-->



    </div>



<!--End Maint content -->
<?php
outputSideBarPart1();
?>


<!--Side Bar content here-->
    <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading" >Lorem ipsum</h4>
        <p class="list-group-item-text"> some text </p>

    </a>
    <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading" >Lorem ipsum</h4>
        <p class="list-group-item-text"> some text </p>

    </a>



<!--End side bar content -->
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