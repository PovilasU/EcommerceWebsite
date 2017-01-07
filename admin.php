<?php
session_start();
require 'connect.php';
require 'current_user.php';
$collection = $db->products;
$cursor = $collection->find();
$admin='admin';

if($_SESSION['username'] == $admin){
    echo "Hello Admin , do whatever you like";

}
else {
    echo "You do not have permissiont to be there!";
    header("Location: index.php");

};

if(isset($_POST['submit'])){
    $itemName=strip_tags($_POST['itemName']);
    $price=strip_tags($_POST['price']);
    $quantity=strip_tags($_POST['quantity']);
    $description=strip_tags($_POST['description']);
    $error = array();

    if(empty($itemName))
    {
        $error[] = "Enter item name";
    }

    if(empty($price)){
        $error[] = "Enter price";
    }
    if(empty($quantity)){
        $error[] = "Enter quantity";
    }
    if(empty($description)){
        $error[] = "Enter description";
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


            $query=array('name'=>$itemName);
            //checking for existing user
            $count=$collection->findOne($query);

            if(!count($count)){
                //Save the New user
                $item=array('name'=>$itemName,'price'=>$price,'quantity'=>$quantity,'description'=>$description);
                $collection->save($item);
                echo "Item added successfully.";
            }else{
                echo "Item is already existed.Please add Item with another name.";
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



if(isset($_POST['modify'])) {
    echo 'The submit button is pressed!';
    $itemName=strip_tags($_POST['itemName']);
    $price=strip_tags($_POST['price']);
    $quantity=strip_tags($_POST['quantity']);
    $description=strip_tags($_POST['description']);
    $error = array();

    if(empty($itemName))
    {
        $error[] = "Enter item name";
    }

    if(empty($price)){
        $error[] = "Enter price";
    }
    if(empty($quantity)){
        $error[] = "Enter quantity";
    }
    if(empty($description)){
        $error[] = "Enter description";
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


            $query=array('name'=>$itemName);
            //checking for existing user
            $count=$collection->findOne($query);

            if(!count($count)){
                //Save the New user
                echo "Item is not found.";

            }else{
                echo "Item is found.";
                $item=array('name'=>$itemName,'price'=>$price,'quantity'=>$quantity,'description'=>$description);
                $collection->update(
                    array('name'=>$itemName),$item);
                echo "Item modified successfully.";
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
    <title>
        Registration
    </title>
</head>
<body>
<!-- Navigation section -->
<div class="navigation">
    <a class="selected" href="index.php">Home</a>
    <a href="shop.php">Shop</a>
    <a href="cart.php">Cart</a>
    <a href="registration.php">Registration</a>
    <a href="admin.php">Registration</a>
    <a href="login.php">Login</a>
    <a href="logout.php?action=logout">Logout</a>
</div>

<!--Items table-->
<table cellpadding="2" cellspacing="2" border="0">
    <tr>
<!--        <th>Id</th>-->
        <th>Name</th>
        <th>Price £</th>
        <th>Quantity</th>
        <th>Description</th>
        <!--        <th>Description</th>-->
<!--        <th>Buy</th>-->
    </tr>

    <?php foreach ($cursor as $product) {?>

        <tr>
<!--            <td>--><?php //echo $product["_id"] ; ?><!--</td>-->
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

<!--Add item form-->
<form action="admin.php" method="POST">
    ItemName:
    <input type="text" id="itemName" name="itemName"  /></br></br>
    Price £:
    <input type="text" id="price" name="price"  /></br></br>
    Quantity:
    <input type="text" id="quantity" name="quantity"  /></br></br>
    Description:
    <input type="text" id="description" name="description"  /></br></br>
    <input  name="submit" id="submit" type="submit" value="Add Item" />
    <input  name="modify" id="submit" type="submit" value="Modify Item" />
</form>





<?php
//print_r($_SESSION);
?>

</body>
</html>