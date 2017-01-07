<?php
session_start();
echo 'Welcome '.$_SESSION['username'];
echo '<br><a href="index.php?action=logout">Logout</a> ';
?>