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
            <h3 align="center">E-commerce website project. <small></small> </h3>
        </div>
<!--        <img  class="featuredImg" src="img/idear.jpg"  width="100%" alt="">-->
        <p>Coursework2</p>
        <p>Web applications and databases</p>
        <p>Tools used: PHP, HTML, CSS, JavaScript, AJAX, Bootstrap, MongoDb, PhpStorm, SublimeText3, Notepad++, Chrome, Mozilla, GitHub</p>
        <h4>Middlesex University Computer Science Second year students: </h4>
        <p>Povilas Urbonas - Front end,Back end, databases, debuging</p>
        <p>Name surname - Proposal, testing</p>
        <p>Name surname - Proposal, testing</p>
    </div>
<!--End Maint content -->

<?php
//output information bar
outputInformation();
//Output the footer
outputFooter();
?>