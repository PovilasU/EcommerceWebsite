<?php
   // connect to mongodb
   $m = new MongoClient();
   echo "Connection to database successfully";
       echo "<br>";	
	
   // select a database
   $db = $m->mydb;
   echo "Database mydb selected";
       echo "<br>";	
   $collection = $db->people;
   echo "Collection selected succsessfully";
       echo "<br>";	
	

   
   $cursor = $collection->find();
   // iterate cursor to display title of documents
   
    echo "<br>";	
   foreach ($cursor as $document) {
   //   echo $document["_id"] . "\n";
 //  echo "name";
	   echo "name: ".$document["name"] . "\n" ."<br>";
	    echo "email: ". $document["email"] . "\n"."<br>";
		 echo "password: ".$document["password"] . "\n"."<br>";
		 echo "<br>";
		
   }
   
   
   
   
   		$username = $_POST['username'];
		$password = $_POST['userPassword'];


       // $user = $db->$collection->findOne(array('username'=> 'user1', 'password'=> 'pass1'));
		$user = $db->$collection->findOne(array('username'=> $username, 'password'=> $password));

        foreach ($user as $obj) {
            echo 'Username' . $obj['username'];
            echo 'password: ' . $obj['password'];
            if($userName == 'user1' && $userPass == 'pass1'){
                echo 'found'  ;          
            }
            else{
                echo 'not found';            
            }

        }
?>