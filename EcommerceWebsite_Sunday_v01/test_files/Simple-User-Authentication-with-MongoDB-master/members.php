<?
include_once("config.php");

if(!loggedIn()):
header('Location: index_version_02.php');
endif;

print("Welcome to the members page <b>".$_SESSION["login"]."</b><br>\n");
print("Your password is: <b>".$_SESSION["password"]."</b><br>\n");
print("<a href=\"logout.php"."\">Logout</a>");
?>
