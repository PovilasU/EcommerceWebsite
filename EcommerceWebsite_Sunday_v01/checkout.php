<?php

//Connect to database
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Select a collection
$collection = $db->orders;

//Extract the product IDs that were sent to the server
$prodIDs= $_POST['prodIDs'];

//Convert JSON string to PHP array 
$productArray = json_decode($prodIDs, true);

//Output the IDs of the products that the customer has ordered
echo '<h1>Products Sent to Server</h1>';
for($i=0; $i<count($productArray); $i++){
    echo '<p>Product ID: ' . $productArray[$i]['id'] . '. Count: ' . $productArray[$i]['count'] . '. customerID: ' . $productArray[$i]['customerID'] .'</p>';
}
     //$document["_id"] . '", "' . $document["name"] . '", "' . $_SESSION["_id"]
/* Next steps:
 * Get the customer ID from the $_SESSION variable or request customer's details.
 * Add an order document to the database containing product IDs, customer ID, date, count, price etc.
 * Update stock counts in product database.
 * Display confirmation page to customer.
 */

//Add the order to the database
$returnVal = $collection->insert($productArray);

//Echo result back to user
if($returnVal['ok']==1){
    echo 'Ok. Order has been sent to server' ;
}
else {
    echo 'Error adding product';
}

//Close the connection
$mongoClient->close();

