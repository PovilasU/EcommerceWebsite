<?php
session_start();
echo 'Welcome '.$_SESSION['username'];
echo '<br><a href="index_version_02.php?action=logout">Logout</a> ';
?>