<?php
    //Start session management
    session_start();
    
    if( array_key_exists("loggedInUserEmail", $_SESSION) ){
        echo "you are logged in" ."</br>";
        echo 'Session in progress.'."</br>";
        echo 'Id=' . $_SESSION["_id"].'</br>';
        echo 'name=' . $_SESSION["name"].'</br>';
        echo 'email=' . $_SESSION["loggedInUserEmail"].'</br>';

        //Giving some tome to read messages
        echo "<meta http-equiv=\"refresh\" content=\"3;url=http://localhost/ecommercewebsite/index.php\"/>";

    }
    else{
        echo 'Not logged in.';
    }

