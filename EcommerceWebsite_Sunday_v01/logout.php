
<?php

//Include the PHP functions to be used on the page
require 'connect.php';
include('common.php');
//Output header and navigation
outputHeader("Logout");
outputTopHeader();
outputBannerNavigation("Home");
echo '<div class="col-md-12">';
echo ' <img src="images/logout.jpg" alt="" class="img-responsive" width="100%"/>';
echo '</div>';


?>

<?php
echo '<script type="text/javascript">alert(bye);</script>';

//Start session management
session_start();

//Remove all session variables
session_unset();

//Destroy the session
session_destroy();



//Giving some tome to read messages
echo "<meta http-equiv=\"refresh\" content=\"1;url=http://localhost/ecommercewebsite/index.php\"/>";


outputMainBanner();
 ?>