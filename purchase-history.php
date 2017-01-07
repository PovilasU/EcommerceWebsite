



<?php
//session_start();
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

    <div class="panel-body">
        <div class="page-header">
            <h3>Post something! <small>Posted on  date</small> </h3>
        </div>
        <!--        <img  class="featuredImg" src="img/idear.jpg"  width="100%" alt="">-->
        <p>Paragraph</p>
        <h4>A heading</h4>
        <p>paragraph</p>
        <?php
        session_start();
        require 'connect.php';
        require 'current_user.php';
        $collection = $db->orders;
        $cursor = $collection->find();
        $array = iterator_to_array($cursor);
        ?>



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