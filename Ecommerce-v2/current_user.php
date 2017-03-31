<?php
if(isset($_GET['logout'])){
    session_unregister("username");
}


if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
  //  echo "Current User: " .$_SESSION['username'] . "<br>";
   // echo 'Id  '.$_SESSION['_id']."<br>";
 //   echo 'Balance: £'.$_SESSION['balance']."<br>";
    $balance=$_SESSION['balance'];
    $name= $_SESSION['username'];
}
else
    $name= "Guest";
    $balance = 0;
    //echo "Current User: Guest" . "<br>";