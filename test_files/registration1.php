<?php

if($_POST['submit']) {
    // connect to mongodb
    $m = new MongoClient();
    echo "Connection to database successfully" . "<br>";
    echo "<br>";

    // select a database
    $db = $m->shopping_website;
    echo "Database mydb selected" . "<br>";
    $collection = $db->users;
    echo "Collection selected succsessfully" . "<br>";

    $username = $_POST['name'];
    $password = $_POST['password'];

    $document = array(
        "name" => $username,
        "password" => $password
    );

    $collection->insert($document);
    echo "Document inserted successfully";

// search for fruits
    $fruitQuery = array('name' => $username);  //, 'password' => $password);

    $cursor = $collection->find($fruitQuery);


    echo "<br>";
    foreach ($cursor as $document) {
        echo "name found : " . $document["name"] . "\n" . "<br>";

        if ($document["name"] == $username && $document["password"] == $password) {
            echo " user name and password are correct. Welcome " . "\n" . "<br>";
        } else {
            echo "but password is wrong" . "\n" . "<br>";


        }

    }

}
?>



<html>
<body>

<form action="registration1.php" method="post">
    Name: <input type="text" name="name"><br>
    Password: <input type="text" name="password"><br>
<!--    <input type="submit">-->
    <input  name="submit" id="submit" type="submit" value="register" />
</form>
</body>
</html>



