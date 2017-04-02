<?php
session_start();
require 'connect.php';
require 'current_user.php';
$collection = $db->products;
$cursor = $collection->find();

if(isset($_POST['submit'])){
//if($_POST['submit']){
    $ScName=strip_tags($_POST['ScName']);
    $fname=strip_tags($_POST['fname']);
    $lname=strip_tags($_POST['lname']);
    $email=strip_tags($_POST['email']);

    $error = array();

    if(empty($email))
    {
        $error[] = "Email id is empty or invalid";
    }
    if(empty($fname)){
        $error[] = "Enter first name";
    }
    if(empty($lname)){
        $error[] = "Enter last name";
    }

    if (count($error) == 0){
        //database configuration
        $host = 'localhost';
        $database_name = 'shopping_website';
        $database_user_name = '';
        $database_password = '';
        $collection_name ='products';

        $connection=new MongoClient();
        echo "Connection to database successfully" . "<br>";
        echo "<br>";

        if($connection){

            //connecting to database
            $database=$connection->$database_name;

            //connect to specific collection
            $collection=$database->$collection_name;


            $query=array('name'=>$ScName);
            //checking for existing user
            $count=$collection->findOne($query);
//            Name:
//            <input type="text" id="ScName" name="ScName"  /></br></br>
//            Price:
//    <input type="text" id="fname" name="fname"  /></br></br>
//            Quantity:
//    <input type="text" id="lname" name="lname"  /></br></br>
//            Description:
//    <input type="text" id="email" name="email"  /></br></br>

            if(!count($count)){
                //Save the New user
                $user=array('name'=>$ScName,'price'=>$fname,'quantity'=>$lname,'description'=>$email);
                $collection->save($user);
                echo "Item added  successfully.";
            }else{
                echo "Item is already existed.Please add item with another name!";
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


?>

<html>
<head>
    <title> Admin page</title>

</head>
<body>

<!-- Navigation section -->
<div class="navigation">
    <a class="selected" href="index_version_02.php">Home</a>
    <a href="shop.php">Shop</a>
    <a href="cart.php">Cart</a>
    <a href="registration.php">Registration</a>
    <a href="admin_test.php">Admin</a>
    <a href="login.php">Login</a>
    <a href="logout.php?action=logout">Logout</a>
</div>

<!-- Contents of the page -->
<h1>This is the Admin page</h1>
<br>
<h2>You can add or modify items</h2>
<br>

<!--Items table-->
<table cellpadding="2" cellspacing="2" border="0">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>quantity</th>
        <th>description</th>
        <!--        <th>Description</th>-->
<!--        <th>Buy</th>-->
    </tr>

    <?php foreach ($cursor as $product) {?>

        <tr>
            <td><?php echo $product["_id"] ; ?></td>
            <td><?php echo $product["name"] ; ?></td>
            <td><?php echo $product["price"] ; ?></td>
            <td><?php echo $product["quantity"] ; ?></td>
            <td><?php echo $product["description"] ; ?></td>
            <!--            <td>--><?php //echo $product["quantity"] ; ?><!--</td>-->
            <!--            <td>--><?php //echo $product["description"] ; ?><!--</td>-->
<!--            <td><a href="cart.php?_id=--><?php //echo $product["_id"]; ?><!--">Order Now</a> </td>-->
        </tr>

    <?php } ?>
</table>
<br>
<br>


<!--Admin form-->
<form action="admin_test.php" method="POST">
    Name:
    <input type="text" id="ScName" name="ScName"  /></br></br>
    Price:
    <input type="text" id="fname" name="fname"  /></br></br>
    Quantity:
    <input type="text" id="lname" name="lname"  /></br></br>
    Description:
    <input type="text" id="email" name="email"  /></br></br>
<!--    Password:-->
<!--    <input type="password" id="password" name="password" />  </br></br>-->
<!--    Confirm Password:-->
<!--    <input type="password" id="password2" name="password2" />  </br></br>-->

    <input  name="submit" id="submit" type="submit" value="Add Item" />
</form>




















<!--<!--Add products form-->-->
<!--<form method="post">-->
<!--    <table cellpadding="2" cellspacing="2" border="0">-->
<!---->
<!--            <td>name</td>-->
<!--            <td><input type="text" name="name"></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>price</td>-->
<!--            <td><input type="text" name="price"></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>quantity</td>-->
<!--            <td><input type="text" name="quantity"></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>description</td>-->
<!--            <td><input type="text" name="description"></td>-->
<!--        </tr>-->
<!--        <td>&nbsp;</td>-->
<!--        <td><input type="submit" name="bttAdd" value="Add item"></td>-->
<!--    </table>-->
<!--</form>-->
<!--<br>-->
<!---->
<!--<!--modify products form-->-->
<!--<form method="post">-->
<!--    <table cellpadding="2" cellspacing="2" border="0">-->
<!--        <tr>-->
<!--            <td>_id</td>-->
<!--            <td><input type="text" name="_id"></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>name</td>-->
<!--            <td><input type="text" name="name"></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>price</td>-->
<!--            <td><input type="text" name="price"></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>quantity</td>-->
<!--            <td><input type="text" name="quantity"></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>description</td>-->
<!--            <td><input type="text" name="description"></td>-->
<!--        </tr>-->
<!--        <td>&nbsp;</td>-->
<!--        <td><input type="submit" name="bttmodify" value="Modify item"></td>-->
<!--    </table>-->
<!--</form>-->


</body>
</html>





