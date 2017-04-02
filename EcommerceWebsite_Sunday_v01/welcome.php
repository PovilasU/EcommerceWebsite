
<?php
//session_start();
//Include the PHP functions to be used on the page
include('common.php');
//Output header and navigation
outputHeader("Welcome Admin");
outputBannerNavigation("Home");
?>
<?php
outputMainPanel();
?>
<!--Maint content here-->

<div class="panel-body">
    <div class="page-header">
        <h3>Welcome Admin Page <small></small> </h3>
    </div>
    <!--        <img  class="featuredImg" src="img/idear.jpg"  width="100%" alt="">-->
<!--    <p>Paragraph</p>-->
<!--    <h4>A heading</h4>-->
<!--    <p>paragraph</p>-->

    <?php
    require 'connect.php';
    session_start();

//    echo 'Welcome '.$_SESSION['username']."<br>";

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

