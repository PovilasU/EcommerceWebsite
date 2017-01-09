<?php
header('Content-type: text/xml'); //we gonna generate xml content
echo '<?hml version="1.0" encoding="UTF=8" standalone="yes" ?>';
echo '<response>';
    $product = $_GET['product']; //we have whatever user typed in input box
    $productArray = array('rolex','kurtas','sonata','titan','casio','omax','sport');// our store list
    //We checking if we have product in store
    if(in_array($product,$productArray))
        echo 'We do have '.$product.'!!!';
    // this is not secure, output should go through html entities
    elseif ($product=='') // check if input field empty
//        echo 'Enter a brand';
    echo ' ';
    else
        echo 'Sorry  we do not have '.$product.'!!!';
echo '</response>';
?>