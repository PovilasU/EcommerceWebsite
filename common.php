<?php

require 'connect.php';
require 'current_user.php';
//require 'item.php';
$collection = $db->products;
$cursor = $collection->find();

//Ouputs the header for the page and opening body tag
function outputHeader($title){
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0" >  ';
    echo '<title>' . $title . '</title>';
    echo '<!-- Link to external style sheet -->';
    echo '<link  href="css/bootstrap.min.css" rel="stylesheet">';
    echo '<link  href="css/styles.css" rel="stylesheet">';
    echo '</head>';
    echo '<body>';

}

/* Ouputs the banner and the navigation bar
    The selected class is applied to the page that matches the page name variable */
function outputBannerNavigation($pageName)
{
    echo '<div class="navbar navbar-inverse navbar-static-top">';
    echo '<div class="container">';
    echo '<a href="#" class="navbar-brand">E-Commerce Website</a><!--End of  <a> navbar-brand-->';
    echo '<button class="navbar-toggle" data-toggle="collapse" data-target = ".navHeaderCollapse">';
    echo '<span class="icon-bar"></span>';
    echo '<span class="icon-bar"></span>';
    echo '<span class="icon-bar"></span>';
    echo '</button><!--End of button-->';
    echo '<div class="collapse navbar-collapse navHeaderCollapse">';
    echo '<ul class="nav navbar-nav navbar-right">';
    echo '<li class="active"><a href="#">Home</a></li>';
    echo '<li><a href="shop.php">Shop</a></li>';
    echo '<li><a href="cart.php">Cart</a></li>';
    echo '<li><a href="registration.php">Registration</a></li>';
    echo '<li><a href="admin.php">Admin</a></li>';
    echo '<li><a href="purchase-history.php">Purchase history</a></li>';
    echo '<li><a href="login.php">Login</a></li>';
    echo '<li><a href="logout.php">Logout</a></li>';
    echo '<li><a href="#">About</a></li>';
    echo '</ul><!--End of class="nav navbar-nav navbar-right"-->';
    echo '</div><!--End of collapse navbar-collapse navHeaderCollapse-->';
    echo '</div><!--End of container-->';
    echo '</div><!--End of navbar-->';
}

function outputMainPanel()
{
    echo '<!--Making Main panel-->';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-lg-9">';
    echo '<div class="panel panel-default">';
    echo '<div class="panel-body">';

}
// add main content here



function outputSideBarPart1(){
    echo '</div>'; //End panel body div
    echo '</div>';
    echo '</div>';
    echo '<!--Side bar div-->';
    echo '<div class="col-lg-3">';
    echo '<div class="list-group">';
}

function outputSideBarPart2(){
    echo '</div>';
    echo '</div>';
    echo '<!--End side bar div-->';
    echo '</div>';
    echo '</div>';
    echo '<!--End of Main panel-->';

}

function outputCart(){
    if(isset($_GET['_id'])){
        $collection = $db->products;
        $realmongoid = new MongoId($_GET['_id']);
        $result = $collection->find(array('_id' => $realmongoid));
        foreach ($result as $product) {}
        $item = new Item();
        $item->_id = $product['_id'];
        $item->name = $product['name'];
        $item->price = $product['price'];
        $item->quantity = 1;
        // Check product is existing in cart
        $index = -1;
        $cart = unserialize(serialize($_SESSION['cart']));
        for ($i=0; $i<count($cart); $i++)
            if($cart[$i]->_id==$_GET['_id'])
            {
                $index = $i;
                break;
            }
        if($index==-1)
            $_SESSION['cart'][]=$item;
        else{
            $cart[$index]->quantity++;
            $_SESSION['cart']= $cart;
        }
    }
// Delete product in cart
    if(isset($_GET['index'])) {
        $cart = unserialize(serialize($_SESSION['cart']));
        unset($cart[$_GET['index']]);
        $cart= array_values($cart);
        $_SESSION['cart']= $cart;
    }

}

function outputPayButton(){

//Pay button
    if(isset($_POST['bttPay'])) {
        echo "HELLLO! time to pay";
        $collection = $db->people;
        $realmongoid = new MongoId($_SESSION['_id']);
        // $realSum = new MongoId($_SESSION['sum']);
        $result = $collection->find(array('_id' => $realmongoid));
        foreach ($result as $item) {}

        $document = array(
            "username" => $item['username'],
            "password" => $item['password'],
            "balance" => ($item['balance'] - $_SESSION['sum']),
        );




        $collection->update(
            array('_id' => $realmongoid),$document

        );


        $result = $collection->find(array('_id' => $realmongoid));
        foreach ($result as $item) {}

        echo "your id is " . $item['_id'];
        echo "your name is " . $item['username'];
        echo "your balance is " . $item['balance'];
        $_SESSION['balance1'] = $item['balance'];
        $balance = $_SESSION['balance1'];

        // test inserto to data base buy history

        $cart = unserialize(serialize($_SESSION['cart']));
        $collection1 = $db->orders;

        $s = 0;
        $index = 0;
        $date = new MongoDate();
        $collection1->insert(array("username" => $_SESSION['username'], "dateAdded"=>$date, $_SESSION['cart'],
            "totalPay"=> $_SESSION['sum']));


    }
}



function outputFooterPart1(){
    echo '<!--Footer div-->';
    echo '<div class="navbar navbar-inverse navbar-fixed-bottom">';
    echo '<div class="container">';
    echo '<div class="container">';
    echo '<p class="navbar-text pull-left">Site Built By Povilas Urbonas 2017</p>';
    echo '<a href="#" class="navbar-btn btn-danger btn pull-right">Subscribe on Youtube</a>';
    echo '</div><!--End of div class="container"-->';
    echo '</div><!--End of div class="navbar" , End of Footer-->';
}

function outputFooterPart2(){
       echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>';
    echo '<script src="js/bootstrap.min.js"></script>';
    echo '</body>';
    echo '</html>';
 
}

?>
