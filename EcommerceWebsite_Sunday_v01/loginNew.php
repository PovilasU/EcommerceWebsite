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
        <h3>Whatever you want! <small>Posted on january 4th</small> </h3>
    </div>
    <?php
    require "connect.php";
   // session_start();
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
            <td><input type="submit" name="bttLogin" value="Login"></td>

        </table>
    </form>


</div>
<!--End Maint content -->

<?php
outputSideBarPart1();
?>
<!--Side Bar here-->
<a href="#" class="list-group-item">
    <h4 class="list-group-item-heading" >Lorem ipsum</h4>
    <p class="list-group-item-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electron</p>
</a>
<a href="#" class="list-group-item">
    <h4 class="list-group-item-heading" >Lorem ipsum</h4>
    <p class="list-group-item-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electron</p>
</a>


<!--End side bar-->
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






