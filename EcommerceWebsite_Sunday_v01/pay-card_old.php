<?php
session_start();
require 'connect.php';
require 'current_user.php';


if(isset($_POST['submit'])){



    if (count($error) == 0){
        //database configuration
        $host = 'localhost';
        $database_name = 'shopping_website';
        $database_user_name = '';
        $database_password = '';
        $collection_name ='paid_orders';

        $connection=new MongoClient();
        echo "Connection to database successfully" . "<br>";
        echo "<br>";

        if($connection){

            //connecting to database
            $database=$connection->$database_name;

            //connect to specific collection
            $collection=$database->$collection_name;


            $query=array('email'=>$email);
            //checking for existing user
            $count=$collection->findOne($query);

            if(!count($count)){
                //Save the New user
//                $user=array('fname'=>$fname,'lname'=>$lname,'ScName'=>$ScName,
//                    'email'=>$email,'password'=>md5($password),'password'=>$password2);

                $order=array('firstName'=>$firstName,'lastName'=>$lastName,'streetAddress'=>$streetAddress,
                    'streeAddress2'=>$streeAddress2,'city'=>$city, 'state'=>$state, 'postCode'=>$postCode,
                    'country'=>$country,'phone'=>$phone, 'creditCardNumber'=>$creditCardNumber,
                    'expirityDate'=>$expirityDate, 'email'=>$email, 'specialNotes'=>$specialNotes);

                $collection->save($order);
                echo "Payment Successful.";
            }else{
                echo "Email is already existed.Please register with another Email id!.";
            }

        }else{

            die("Database are not connected");
        }

    }else{
        //Displaying the error
        foreach($error as $err){
            echo $err.'</br>';
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<html>
<head>

    <title>
        Registration
    </title>
</head>
<body>
<!-- Navigation section -->
<div class="navigation">
    <a class="selected" href="index_version_02.php">Home</a>
    <a href="shop.php">Shop</a>
    <a href="cart.php">Cart</a>
    <a href="registration.php">Registration</a>
    <a href="login.php">Login</a>
    <a href="logout.php?action=logout">Logout</a>
</div>






<script type="text/JavaScript" src="js/card_validation.js"></script>
</body>
</html>

