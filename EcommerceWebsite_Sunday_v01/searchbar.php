<?php



/////////////////////
header('Content-type: text/xml'); //we gonna generate xml content
echo '<?hml version="1.0" encoding="UTF=8" standalone="yes" ?>';
echo '<response>';

//Connect to MongoDB
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->shopping_website;
$product = $_GET['product']; //we have whatever user typed in input box
//Extract the data that was sent to the server
$name= filter_input(INPUT_GET, 'product', FILTER_SANITIZE_STRING);

//Create a PHP array with our search criteria
$findCriteria = [
    "name" => $name,
];

//Find all of the customers that match  this criteria
$cursor = $db->products->find($findCriteria);

/*foreach ($cursor as $cust){
}*/

if ($cursor ->count() == 1) { //JM this is never true??

    echo 'We do have ' . $product . '!!!';


}
elseif ($product=='') // check if input field empty
//        echo 'Enter a brand';
    echo ' ';


else
    echo 'Sorry  we do not have '.$product.'!!!';

echo '</response>';
?>


