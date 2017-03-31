<?php 
/* Adds a customer to the database */
function addCustomer($name, $email, $password){


//Connect to database
$mongoClient = new MongoClient();

//Select a database
$db= $mongoClient->ecommerce;

//Select a collection
$collection =$db->customers;

//Extract the data that was sent to the server
$name= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$name= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$name= filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

//Convert to PHP array
$dataArray = [
"name"=>$name,
"email"=>$email,
"password"=>$password

];

//Add the new product to the database
$returnVal = $collection->insert($dataArray);

//Echo result back to user
if($returnVal['ok']==1){
	echo 'ok';
}
else {
	echo 'Error adding customer';
}

//Close the connection
$mongoClient->close();

}

/* Adds a customer to the database function END*/


 ?>