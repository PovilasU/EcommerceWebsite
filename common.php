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
    echo '<script src="js/searchbar.js"></script>';
    echo '<!-- Link to external style sheet -->';
    echo '<link  href="css/bootstrap.min.css" rel="stylesheet">';
    echo '<link  href="css/styles.css" rel="stylesheet">';
    echo '<link  href="css/styles-overrided.css" rel="stylesheet">';
    echo '</head>';
    echo '<body onload="process()">';    
}

function outputTopHeader(){
    echo ' <!--top-header-->';
    echo '<div class="top-header">';
    echo '<div class="container">';
    echo '<div class="container">';
    echo '<div class="top-header-main">';
    echo '<div class="col-md-6 top-header-left">';
    echo '<div style="float: right" class="cart box_1">';
    echo '<a href="checkout.html">';
    echo '<div class="total">';
    echo '<span class="simpleCart_total"></span></div>';
    echo '<span class="simpleCart_total"> </span></div>';
    echo '<img src="images/cart-1.png" alt="" />';
    echo '</a>';
    echo '<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>';
    echo '</div>';
    echo '<div style="float: right" class="cart box_1">';
    echo '<p style="color: white"><?php echo "Current User: ".$name; ?></p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<!--End top-header-->';
}


/* Ouputs the banner and the navigation bar
    The selected class is applied to the page that matches the page name variable */
function outputBannerNavigation($pageName)
{
//    echo '<div class="navbar navbar-inverse navbar-static-top">';
    echo '<div class="navbar navbar-default navbar-custom navbar-static-top  ">';
    echo '<div  class="container">';
    echo '<a href="#" class="navbar-brand  ">E-Commerce Website</a><!--End of  <a> navbar-brand-->';
    echo '<button class="navbar-toggle" data-toggle="collapse" data-target = ".navHeaderCollapse">';
    echo '<span class="icon-bar"></span>';
    echo '<span class="icon-bar"></span>';
    echo '<span class="icon-bar"></span>';
    echo '</button><!--End of button-->';
    echo '<div class="collapse navbar-collapse navHeaderCollapse">';
    echo '<ul class="nav navbar-nav navbar-right">';
    echo '<li class=""><a href="index.php">Home</a></li>';
    echo '<li><a href="shop.php">Shop</a></li>';
    echo '<li><a href="cart.php">Cart</a></li>';
  //  echo '<li><a href="registration.php">Registration</a></li>';
    echo '<li><a href="admin.php">Admin</a></li>';
//    echo '<li><a href="purchase-history.php">Purchase history</a></li>';
  //  echo '<li><a href="login.php">Login</a></li>';
    echo '<li><a href="logout.php">Logout</a></li>';
    echo '<li><a href="about.php">About</a></li>';
    echo '<li><a href="templatePage.php">Template Page</a></li>';
    echo '<li style="margin-top: 10px " ><input type="text"  placeholder="Search" id="userInput" /></li>';
    echo '<li style="margin-top: 10px "><div id="underInput" > </div></li>';
    echo '</ul><!--End of class="nav navbar-nav navbar-right"-->';
    echo '</div><!--End of collapse navbar-collapse navHeaderCollapse-->';
    echo '</div><!--End of container-->';
    echo '</div><!--End of navbar-->';

}

function outputMainBanner(){  
    echo ' <!--Banner-->';
    echo '<div style="margin-top: 0px" class="container-fluid no-padding">';
    echo '<div class="row">';
    echo '<div class="col-md-12">';
    echo ' <img src="images/dvds/walt_disney_pictures_logo.jpg" alt="" class="img-responsive" width="100%"/>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<!--End Banner-->';
 }

function outputMainPanel()
{
}
// add main content here


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

function outputInformation(){
    echo '<!--information-starts-->';
    echo '<div style="margin-bottom: 80px" class="container">';
    echo '<div class="row">';
    echo '<div class="col-md-3">';
    echo '<h3>Follow Us</h3>';
    echo '<ul>';
    echo '<li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>';
    echo '<li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>';
    echo '<li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>';
    echo '</ul>';
    echo '</div>';
    echo '<div class="col-md-3">';
    echo '<h3>Information</h3>';
    echo '<ul>';
    echo '<li><a href="#"><p>Specials</p></a></li>';
    echo '<li><a href="#"><p>New Products</p></a></li>';
    echo '<li><a href="#"><p>Our Stores</p></a></li>';
    echo '<li><a href="contact.html"><p>Contact Us</p></a></li>';
    echo '<li><a href="#"><p>Top Sellers</p></a></li>';
    echo '</ul>';
    echo '</div>';
    echo '<div class="col-md-3">';
    echo '<h3>My Account</h3>';
    echo '<ul>';
    echo '<li><a href="login.php"><p>My Account</p></a></li>';
    echo '<li><a href="purchase-history.php"><p>My Credit slips</p></a></li>';
    echo '<li><a href="#"><p>My Merchandise returns</p></a></li>';
    echo '<li><a href="#"><p>My Personal info</p></a></li>';
    echo '<li><a href="#"><p>My Addresses</p></a></li>';
    echo '</ul>';
    echo '</div>';
    echo '<div class="col-md-3">';
    echo '<h3>Store Information</h3>';
    echo '<p>Amazing Shop,';
    echo '</br>';
    echo '<span>Baker street 11,</span>';
    echo '</br>';
    echo '<span>Middlesex University Hendon</span>';
    echo '</p>';
    echo '<h5>+44 123 4567</h5>';
    echo '<p><a href="mailto:example@email.com">contact@example.com</a></p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<!--End information-->';
}



function outputFooter(){
    echo '<!--Footer div-->';
    echo '<div class="navbar navbar-inverse navbar-fixed-bottom">';
    echo '<div class="container">';
    echo '<div class="container">';
    echo '<p class="navbar-text pull-left">Site Built By Povilas Urbonas 2017</p>';
    echo '<a href="http://www.trello.com" class="navbar-btn btn-danger btn pull-right">Trello Link</a>';
    echo '</div><!--End of div class="container"-->';
    echo '</div><!--End of div class="navbar" , End of Footer-->';
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>';
    echo '<script src="js/bootstrap.min.js"></script>';
    echo '</body>';
    echo '</html>'; 
}

?>