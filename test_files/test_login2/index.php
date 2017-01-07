<?php
session_start();
if(isset($_POST['bttLogin'])) {
    require "connect.php";
    $collection = $db->people;
//var_dump($collection->count());
    $username = $_POST['username'];
    $password = $_POST['password'];

    $usersQuery = array('username' => $username, 'password' => $password);
    $result = $collection->find($usersQuery);
//var_dump($result->count());
    if ($result->count() == 1) {
        $_SESSION['username'] = $username;
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