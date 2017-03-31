<?php
//session_start();
//Include the PHP functions to be used on the page
include('common.php');
//Output header and navigation
outputHeader("E-Commerce Website");
outputTopHeader();
outputBannerNavigation("about");


?>

<!--Maint content here-->

<div class="panel-body">
    <div class="page-header">
        <h3>Shopping Cart <small></small> </h3>
    </div>
    <!--        <img  class="featuredImg" src="img/idear.jpg"  width="100%" alt="">-->

    <?php
    //session_start();
    require 'connect.php';
    require 'item.php';
    //echo "Balance!!: £" . $balance."<br>";


    //update balance $_SESSION['_id']






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










    ?>
    <table cellspacing="2" cellpadding="2" border="1">
        <tr>
            <th>Option</th>
            <th>_Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Sub Total</th>
        </tr>
        <?php
        $cart = unserialize(serialize($_SESSION['cart']));
        $s = 0;
        $index = 0;
        for($i=0; $i<count($cart); $i++){
            $s += $cart[$i]->price * $cart[$i]->quantity;
            ?>
            <tr>
                <td><a href="cart.php?index=<?php echo $index; ?>" onClick="return confirm ('Are you sure?')">Delete</a></td>
                <td><?php echo $cart[$i]->_id; ?></td>
                <td><?php echo $cart[$i]->name; ?></td>
                <td><?php echo $cart[$i]->price; ?></td>
                <td><?php echo $cart[$i]->quantity; ?></td>
                <td><?php echo $cart[$i]->price * $cart[$i]->quantity; ?></td>
            </tr>
            <?php
            $index++;
        }
        ?>



        <tr>
            <td colspan="5" align="right">Sum</td>
            <td align="left"> <?php echo $s; ?> </td>
            <?php
            $_SESSION['sum']= $s;
            ?>
        </tr>
    </table>

    <!--Pay form-->
    <form action="pay-card.php" method="post">
        <td><input type="submit" name="bttPay" value="Pay"></td>
    </form>

    <br>

    <br>
    <a href="index.php">Continue Shopping</a>
    <?php

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

    ?>


</div>
<!--End Maint content -->


<!--Side Bar content here-->



<!--End side bar content -->

<?php
//output information bar
outputInformation();
outputFooter();
?>
