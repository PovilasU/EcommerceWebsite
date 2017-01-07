<?php
require "connect.php";
session_start();
require "current_user.php";

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
<html>
<body>

<!-- Navigation section -->
<div class="navigation">
    <a class="selected" href="index.php">Home</a>
    <a href="shop.php">Shop</a>
    <a href="cart.php">Cart</a>
    <a href="registration.php">Registration</a>
    <a href="login.php">Login</a>
    <a href="logout.php">Logout</a>
</div>

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


<!--Welcome --><?php //echo $_POST["email"]; ?><!--<br>-->

</body>
</html>







