<?php
$m = new MongoClient();
$db = $m->shopping_website;
$collection = $db->products;
$mongoid="5860aab7129a00d8a25ec634";

$realmongoid = new MongoId($mongoid);


$something = $collection->find(array('_id' => $realmongoid));
echo $something->count(); // This should echo 1


foreach ($something as $document) {
    echo "name: ".$document["name"] . "\n" ."<br>";
    echo "_id: ". $document["_id"] . "\n"."<br>";
    echo "price: ".$document["price"] . "\n"."<br>";
    echo "<br>";

}