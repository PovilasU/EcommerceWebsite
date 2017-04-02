<?php
//session_start();
//Include the PHP functions to be used on the page
include('common.php');
//Output header and navigation
outputHeader("E-Commerce Website");
outputTopHeader();
outputBannerNavigation("about");


?>



    <!--Maint content here-->

    <div class="panel-body">
        <div class="page-header">
            <h3 align="center">Credit slips <small></small> </h3>
        </div>
        <!--        <img  class="featuredImg" src="img/idear.jpg"  width="100%" alt="">-->

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
            echo "Order ";
            echo "date: ".date('D M Y  h:m:s')."<br>"; //JM removed ,$date->sec //JM doesn't show date, only day of week
            //  echo "Item name ". "<br>"; //. " Price "." Quantity "."<br>";
            ?>


            <?php

            foreach ($product["0"] as $orderItem ){ //JM product["0"]?? undefined offset
                echo  "Item name: ". $orderItem["name"]."";
                echo ", Price: £".$orderItem["price"]."";
                echo  ", Quantity: " .$orderItem["quantity"]." ";
                echo "<br>";
                ?>



            <?php }
            echo "Total paid: £". $product["totalPay"]."<br>"."<br>"; //JM totalpay??
        }
        ?>
    </div>
    <!--End Main content -->




<?php
//output information bar
outputInformation();
outputFooter();
?>