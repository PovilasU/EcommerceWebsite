<?php
//Connecto to database
$mongoCLient = new MongoClient();

//Select a database
$db = $mongoCLient->ecomerce;

//select a collection
$collection = $db->customers;

//Extract the data that was sent to the server

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

//Convert to PHP array
$dataArray = [
"name"=> $name,
"email"=> $email,
"password"=>$password
];

//Add the new product to the database
$returnVal= $collection->insert($dataArray);

//Echo result back to user
if($returnVal['ok']==1){
	echo 'ok';
}
else {
	echo 'Error adding customer';
}

//Close the connection
$mongoCLient->close();

?>