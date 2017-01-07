<?php
session_start(); // Starting Session
$error='somethis is wrong'; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
   // connect to mongodb
   $m = new MongoClient();
  // echo "Connection to database successfully"."<br>";
	

 //  echo "Database shopping_website selected". "<br>";
   $collection = $db->users;
  // echo "Collection selected succsessfully"."<br>";


//$connection = mysql_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
//$db = mysql_select_db("company", $connection);
   // select a database
   $db = $m->shopping_website;
   $usersQuery = array('email' => $username);  //, 'password' => $password);
   $cursor = $collection->find($usersQuery);
   foreach ($cursor as $document) {
        echo "email found : ".$document["email"] . "\n" ."<br>";	  
		if($document["email"] == $username && $document["password"] == $password){
			echo " user email and password are correct. Welcome " . "\n"."<br>";
			$_SESSION['login_user']=$username; // Initializing Session
            header("location: profile.php"); // Redirecting To Other Page			
		}
		else {
        echo "but password is wrong". "\n"."<br>";
		$error = "Username or Password is invalid";
    }
		 
   }
}
}
   
   
// SQL query to fetch information of registerd users and finds user match.
//$query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);
//$rows = mysql_num_rows($query);
//if ($rows == 1) {
//$_SESSION['login_user']=$username; // Initializing Session
//header("location: profile.php"); // Redirecting To Other Page
//} else {
//$error = "Username or Password is invalid";
//}
//mysql_close($connection); // Closing Connection
//}
//}
?>