<?php
//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->shopping_website;

//Extract the data that was sent to the server
$name= filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);

//Create a PHP array with our search criteria
$findCriteria = [
    "fname" => $name, 
 ];

//Find all of the customers that match  this criteria
$cursor = $db->users->find($findCriteria);

//Output the results
echo "<h1>Results</h1>";
foreach ($cursor as $cust){
   echo "<p>";
   echo "Customer name: " . $cust['fname'];
   echo " Email: ". $cust['email'];
   echo "</p>";
}

//Close the connection
$mongoClient->close();


