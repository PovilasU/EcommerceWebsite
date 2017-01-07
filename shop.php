

<?php
session_start();
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

    require 'connect.php';
    $collection = $db->products;
    $cursor = $collection->find();

    foreach ($cursor as $document) {
        echo "Name: ".$document["name"] . "\n" ."<br>";
        echo "Price £: ". $document["price"] . "\n"."<br>";
        echo "Quantity: ".$document["quantity"] . "\n"."<br>";
        echo "Description: ".$document["description"] . "\n"."<br>";
        echo "<br>";
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

  




