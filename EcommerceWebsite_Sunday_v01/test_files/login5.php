<?php
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = ($_POST['username']);
    $password = ($_POST['password']);
    $pass_hash = md5($password);
    if(empty($username)){
        die("Empty or invalid email address");
    }
    if(empty($password)){
        die("Enter your password");
    }
    $con = new MongoClient();
    // Select Database
    if($con){
        $db = $con->mydb;
        // Select Collection
        $collection = $db->people;   // you may use 'admin' instead of 'Admin'
        $qry = array("name" => $username, "password" => $pass_hash);
        $result = $collection->find($qry);

        if(!empty($result)){
            echo "You are successfully loggedIn";
        }else{
            echo "Wrong combination of username and password";
        }
    }else{
        die("Mongo DB not connected!");
    }
}
?>










<html>
<head>
<title> Login</title>
</head>
<body>
<form action="login5.php" method="POST">
User Name:
 <input type="text" id="username" name="username" />
 Password:
  <input type="password" id="password" name="password" />
<input name="submit" id="submit" type="submit" value="Login" />
</form>
</body>
</html>
