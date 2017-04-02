<?php
if(isset($_GET['logout'])){
    session_unregister("username");
}


if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {

    $name= $_SESSION['username'];
}
else
    $name= "Guest";
    $balance = 0;
    //echo "Current User: Guest" . "<br>";