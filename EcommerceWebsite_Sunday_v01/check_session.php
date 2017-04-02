<?php
    //Start session management
    session_start();
    
    //Find out if session exists
    if( array_key_exists("name", $_SESSION) ){
        echo 'Session in progress'.'</br>' .'name=' . $_SESSION["name"].'</br>';

    }
    else{
        echo 'Session not started';
    }
    
    