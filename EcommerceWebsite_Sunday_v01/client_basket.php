<?php
//Start session management
session_start();

//Find out if session exists
if( array_key_exists("username", $_SESSION) ){
    //  echo 'Session in progress. username=' . $_SESSION["username"];
}
else{
    echo 'Session not started';
    header("Location: login.php");
}

if(array_key_exists('username',$_SESSION) && empty($_SESSION['username'])) {
    echo 'You are not loged in, please register first or login';
    header("Location: login.php");
}
//Output result
echo 'Session started.' ."</br>";
echo 'Loged user=' . $_SESSION["username"]."</br>";
echo 'User ID=' . $_SESSION["_id"];
$customerID=$_SESSION["_id"];


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Basket Demo</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="basket.js"></script>
    </head>
    <body>
        <h1>Shopping Website</h1>

        <!-- PHP loads product information -->        
        <?php

        //Connect to MongoDB and select database
        $mongoClient = new MongoClient();
        $db = $mongoClient->ecommerce;
        
        //Find all products
        $products = $db->products->find();



        //Output results onto page
        if($products->count() > 0){
            echo '<table>';
            echo '<tr><th>ID</th><th>Name</th><th>price</th><th>rating</th><th>quantity</th> <th>description</th> <th>Buy</th></tr>';
            foreach ($products as $document) {
                echo '<tr>';
                echo '<td>' . $document["_id"] . "</td>";
                echo '<td>' . $document["name"] . "</td>";
                echo '<td>' . $document["price"] . "</td>";
                echo '<td>' . $document["rating"] . "</td>";
                echo '<td>' . $document["quantity"] . "</td>";
                echo '<td>' . $document["description"] . "</td>";
                echo '<td><button onclick=\'addToBasket("' . $document["_id"] . '", "' . $document["name"] . '", "' . $customerID . '")\'>';
                echo '<img class="addButtonImg" src="basket-add-icon.png"></button></td>';
                echo '</tr>';
            }
            echo '</table>';
        }

        //Close the connection
        $mongoClient->close();

        ?>
        
        <!-- Displays contents of basket -->    
        <h2>Basket</h2>
        <div id="basketDiv"></div>
    
    </body>
</html>
        