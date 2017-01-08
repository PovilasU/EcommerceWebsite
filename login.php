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
   // require "current_user.php";

    if(isset($_POST['bttLogin'])) {
        require "connect.php";
        $collection = $db->people;
//var_dump($collection->count());
        $username = $_POST['username'];
        $password = $_POST['password'];

        $usersQuery = array('username' => $username, 'password' => $password);
        $result = $collection->find($usersQuery);
        foreach ($result as $data) {};
//var_dump($result->count());
        if ($result->count() == 1) {

            $_SESSION['username'] = $username;
            $_SESSION['_id']= $data['_id'];
            $_SESSION['balance']= $data['balance'];
            header('Location: welcome.php');
        } else
            echo "Invalid account" . "<br>";
    }
    if(isset($_GET['logout'])){
        session_unregister("username");
    }

    ?>

<div align="center" class="container">
    <h1>Account</h1>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <!--Login form-->
            <form method="post">
                <table cellpadding="2" cellspacing="2" border="0">
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <td>&nbsp;</td>
                    <td><input class="btn btn-primary" type="submit" name="bttLogin" value="Login"></td>


                </table>
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





