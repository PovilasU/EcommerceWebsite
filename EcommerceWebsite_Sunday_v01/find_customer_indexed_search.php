<?php
//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Extract the data that was sent to the server
$search_string = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);

//Create a PHP array with our search criteria
$findCriteria = [
    '$text' => [ '$search' => $search_string ] 
 ];

//Find all of the customers that match  this criteria
$cursor = $db->customers->find($findCriteria);

//Output the results
echo "<h1>Results</h1>";
foreach ($cursor as $cust){
   echo "<p>";
   echo "Customer name: " . $cust['name'];
   echo " Email: ". $cust['email'];
   echo " ID: " . $cust['_id'];
   echo "</p>";
}

//Close the connection
$mongoClient->close();




