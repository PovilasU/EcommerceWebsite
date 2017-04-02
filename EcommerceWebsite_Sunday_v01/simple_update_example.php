<?php
//Connect to database
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->shopping_website;

//Create a PHP array with our search criteria
$findCriteria = [
    '$text' => [ '$search' => "Anne" ] 
 ];

//Specify how the documents will be updated
$updateCriteria = [
    '$set' => [ "password" => "abcd" ]
];

//Update all of the customers that match  this criteria
$returnVal = $db->users->update($findCriteria, $updateCriteria);

//Echo result back to user
if($returnVal['ok']==1){
    echo 'ok' ;
}
else {
    echo 'Error updating customer';
}

//Close the connection
$mongoClient->close();
