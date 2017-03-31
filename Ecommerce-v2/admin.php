<?php
//session_start();
//Include the PHP functions to be used on the page
include('common.php');
//Output header and navigation
outputHeader("E-Commerce Website");
outputBannerNavigation("Home");

?>
<?php
outputMainPanel();
?>
    <!--Main content here-->

    <div class="panel-body">
        <div class="page-header">
            <h3>Post something! <small>Posted on  date</small> </h3>
        </div>
        <?php
        session_start();
        require 'connect.php';
        require 'current_user.php';
        $collection = $db->products;
        $cursor = $collection->find();
        $admin='admin';

        if($_SESSION['username'] == $admin){
            echo "Hello Admin , do whatever you like";

        }
        else {
            echo "You do not have permissiont to be there!";
            header("Location: index.php");

        };

        if(isset($_POST['submit'])){
            $itemName=strip_tags($_POST['itemName']);
            $price=strip_tags($_POST['price']);
            $quantity=strip_tags($_POST['quantity']);
            $description=strip_tags($_POST['description']);
            $image=strip_tags($_POST['image']);
            $error = array();

            if(empty($itemName))
            {
                $error[] = "Enter item name";
            }

            if(empty($price)){
                $error[] = "Enter price";
            }
            if(empty($quantity)){
                $error[] = "Enter quantity";
            }
            if(empty($description)){
                $error[] = "Enter description";
            }
            if(empty($image)){
                $error[] = "Enter image name";
            }

            if (count($error) == 0){
                //database configuration
                $host = 'localhost';
                $database_name = 'shopping_website';
                $database_user_name = '';
                $database_password = '';
                $collection_name ='products';

                $connection=new MongoClient();
                echo "Connection to database successfully" . "<br>";
                echo "<br>";

                if($connection){

                    //connecting to database
                    $database=$connection->$database_name;

                    //connect to specific collection
                    $collection=$database->$collection_name;


                    $query=array('name'=>$itemName);
                    //checking for existing user
                    $count=$collection->findOne($query);

                    if(!count($count)){
                        //Save the New user
                        $item=array('name'=>$itemName,'price'=>$price,'quantity'=>$quantity,'description'=>$description, 'image'=>$image);
                        $collection->save($item);
                        echo "Item added successfully.";
                    }else{
                        echo "Item is already existed.Please add Item with another name.";
                    }

                }else{

                    die("Database are not connected");
                }

            }else{
                //Displaying the error
                foreach($error as $err){
                    echo $err.'</br>';
                }
            }
        }



        if(isset($_POST['modify'])) {
            echo 'The submit button is pressed!';
            $itemName=strip_tags($_POST['itemName']);
            $price=strip_tags($_POST['price']);
            $quantity=strip_tags($_POST['quantity']);
            $description=strip_tags($_POST['description']);
            $image=strip_tags($_POST['image']);
            $error = array();

            if(empty($itemName))
            {
                $error[] = "Enter item name";
            }

            if(empty($price)){
                $error[] = "Enter price";
            }
            if(empty($quantity)){
                $error[] = "Enter quantity";
            }
            if(empty($description)){
                $error[] = "Enter description";
            }
            if(empty($image)){
                $error[] = "Enter image name";
            }

            if (count($error) == 0){
                //database configuration
                $host = 'localhost';
                $database_name = 'shopping_website';
                $database_user_name = '';
                $database_password = '';
                $collection_name ='products';

                $connection=new MongoClient();
                echo "Connection to database successfully" . "<br>";
                echo "<br>";

                if($connection){

                    //connecting to database
                    $database=$connection->$database_name;

                    //connect to specific collection
                    $collection=$database->$collection_name;


                    $query=array('name'=>$itemName);
                    //checking for existing user
                    $count=$collection->findOne($query);

                    if(!count($count)){
                        //Save the New user
                        echo "Item is not found.";

                    }else{
                        echo "Item is found.";
                        $item=array('name'=>$itemName,'price'=>$price,'quantity'=>$quantity,'description'=>$description, 'image'=>$image);
                        $collection->update(
                            array('name'=>$itemName),$item);
                        echo "Item modified successfully.";
                    }

                }else{

                    die("Database are not connected");
                }

            }else{
                //Displaying the error
                foreach($error as $err){
                    echo $err.'</br>';
                }
            }
        }




        ?>


        <!--Items table-->
        <table cellpadding="2" cellspacing="2" border="0">
            <tr>
                <!--        <th>Id</th>-->
                <th>Name</th>
                <th>Price £</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Image</th>
                <!--        <th>Description</th>-->
                <!--        <th>Buy</th>-->
            </tr>

            <?php foreach ($cursor as $product) {?>

                <tr>
                    <!--            <td>--><?php //echo $product["_id"] ; ?><!--</td>-->
                    <td><?php echo $product["name"] ; ?></td>
                    <td><?php echo $product["price"] ; ?></td>
                    <td><?php echo $product["quantity"] ; ?></td>
                    <td><?php echo $product["description"] ; ?></td>
                    <td><?php echo $product["image"] ; ?></td>
<!--                    <td>--><?php //echo $product["image"] ; ?><!--</td>-->
                    <!--            <td>--><?php //echo $product["quantity"] ; ?><!--</td>-->
                    <!--            <td>--><?php //echo $product["description"] ; ?><!--</td>-->
                    <!--            <td><a href="cart.php?_id=--><?php //echo $product["_id"]; ?><!--">Order Now</a> </td>-->
                </tr>

            <?php } ?>

        </table>

        <br>
        <br>

        <!--Add item form-->
        <form action="admin.php" method="POST">
            ItemName:
            <input type="text" id="itemName" name="itemName"  /></br></br>
            Price £:
            <input type="text" id="price" name="price"  /></br></br>
            Quantity:
            <input type="text" id="quantity" name="quantity"  /></br></br>
            Description:
            <input type="text" id="description" name="description"  /></br></br>
            Image name:
            <input type="text" id="image" name="image"  /></br></br>
            <input  name="submit" id="submit" type="submit" value="Add Item" />
            <input  name="modify" id="submit" type="submit" value="Modify Item" />
        </form>

    </div>
    <!--End Maint content -->
<?php
outputSideBarPart1();
?>
    <!--Side Bar content here-->
    <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading" >Lorem ipsum</h4>
        <p class="list-group-item-text"> some text </p>

    </a>
    <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading" >Lorem ipsum</h4>
        <p class="list-group-item-text"> some text </p>

    </a>



    <!--End side bar content -->
<?php
outputSideBarPart2();

?>
<?php
//Output the footer
outputFooterPart1();
?>

<?php
outputFooterPart2();
?>