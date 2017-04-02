<?php 
/* Returns true if a customerwith the specified email exists */
function customerExists($email){
	//Connect to MongoDB
	$mongoClient = new MongoClient();

	//Select a database
	$db = $mongoClient->ecommerce;

	//Create a PHP array with our search criteria
	$findCrieteria = [
	"email" => $email,
	];

	//Find all of the customers that match this criteria
	$cursor = $db->customers->find($findCriteria);

	//Close the connection
	$mongoClient->close();

	//Return true there if we have found a customer
	if($cursor->count() > 0){
		return true;
	}
	return false;
}


/* Deletes a customer with the specified email if they exist */
function deleteCustomer($email){
	//Connect to MongoDB
	$mongoClient = new MongoClient();

	//Select a database
	$db = $mongoClient->ecommerce;

	//Build PHP array with remove criteria
	$remCriteria = [
		"email"=>$email
	];

	//Delete the customer document
	$db->customers->remove($remCriteria);

	//Close the connection
	$mongoClient->close();
}


 ?>