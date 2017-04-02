<?php 
/* Adds a customer to the database */
function addCustomer($name, $email, $password){

//Connect to database
$mongoClient = new MongoClient();

//Select a database
$db= $mongoClient->ecommerce;

//Select a collection
$collection = $db->customers;


//Convert to PHP array
$dataArray = [
"name"=>$name,
"email"=>$email,
"password"=>$password

];

//Add the new product to the database
$returnVal = $collection->insert($dataArray);


//Close the connection
$mongoClient->close();

//Echo result back to user
if($returnVal['ok']==1){
	return 'ok';
}
	return 'Error addingg customer';
}




/* Adds a customer to the database function END*/


 ?>