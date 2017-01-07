<?php
session_start();
//Include the PHP functions to be used on the page
include('common.php');
//Output header and navigation
outputHeader("E-Commerce Website");
outputBannerNavigation("About");
outputMainBanner();
?>
<?php
outputMainPanel();
?>
<!--Maint content here-->

    <div class="panel-body">
        <div class="page-header">
            <h3>E-commerce website project. <small>2017</small> </h3>
        </div>
<!--        <img  class="featuredImg" src="img/idear.jpg"  width="100%" alt="">-->
        <p>Coursework2</p>
        <p>Web applications and databases</p>
        <p>Tools used: PHP, HTML, CSS, JavaScript, Bootstrap, MongoDb, PhpStorm, SublimeText3, Notepad++, Chrome, Mozilla, GitHub</p>
        <h4>Middlesex University Computer Science Second year students: </h4>
        <p>Povilas Urbonas - Web developing, databases, debuging</p>
        <p>Name surname - Proposal, testing</p>
        <p>Name surname - Proposal, testing</p>
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