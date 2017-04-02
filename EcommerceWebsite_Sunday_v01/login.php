<title>Login Page</title>

<?php
//session_start();
//Include the PHP functions to be used on the page
include('common.php');
//Output header and navigation
outputHeader("E-Commerce Website");
outputBannerNavigation("Home");

?>

<!--Maint content here-->


<?php
require "connect.php";
session_start();



?>

<div align="center" class="container">
    <h1>Account</h1>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Customer Login</h1>
            <!--Login form-->
            <form action="customer_login.php" method="post">
                Email: <input type="email" name="email" required>
                Password: <input type="password" name="password" required>
                <input class="btn btn-primary" input type="submit">
            </form>
        </div>



        <div class="col-md-6">
            <h3 >New User? Create an Account</h3>
            <p class="list-group-item-text"> By creating an account with our store, you will be able to move through the checkout process faster,
                store multiple shipping addresses, view and track your orders in your account and more. </p>
            <a href="registration.php" class="btn btn-primary" role="button">Create an Account</a>
        </div>
    </div>
</div>




<!--End side bar content -->

<?php
//output information bar
outputInformation();
outputFooter();
?>





