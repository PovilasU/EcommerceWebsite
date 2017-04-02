<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: index_version_02.php"); // Redirecting To Home Page
}
?>