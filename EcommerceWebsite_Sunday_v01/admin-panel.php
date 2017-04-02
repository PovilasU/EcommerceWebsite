<title>Basket Demo</title>
<link rel="stylesheet" type="text/css" href="styles.css">
<script src="basket.js"></script>

<?php
//session_start();
//Include the PHP functions to be used on the page
include('common.php');
//Output header and navigation


?>
<?php
outputMainPanel();
?>
    <!--Main content here-->

    <div class="panel-body">
        <div class="page-header">
            <h3>Control managment system <small></small> </h3>
        </div>
        <?php
        session_start();
        require 'connect.php';
        require 'current_user.php';
        $collection = $db->products;
        $cursor = $collection->find();
        $admin='admin';
        //If connection successful
        if($_SESSION['username'] == $admin){
            echo "Welcome admin";

        }
        //if connection not successfull redirect to login page
        else {
            echo "You do not have permission to be there!";
            header("Location: cms.html");
        };



        ?>

        <!-- PHP loads product information -->
        <?php

        //Connect to MongoDB and select database
        $mongoClient = new MongoClient();
        $db = $mongoClient->ecommerce;

        //Find all products
        $products = $db->products->find();

        //Output results onto page
        if($products->count() > 0){
            echo '<table>';
            echo '<tr><th>ID</th><th>Name</th><th>Description</th></tr>';
            foreach ($products as $document) {
                echo '<tr>';
                echo '<td>' . $document["_id"] . "</td>";
                echo '<td>' . $document["name"] . "</td>";
                echo '<td>' . $document["description"] . "</td>";
                echo '</tr>';
            }
            echo '</table>';
        }

        //Close the connection
        $mongoClient->close();

        ?>

        <!-- Displays contents of basket -->
        <h2>Basket</h2>
        <div id="basketDiv"></div>
        <!--Items table-->


        <br>
        <br>

        <!--Add item form-->
        <form action="admin-panel.php" method="POST">
            ItemName:
            <input type="text" id="itemName" name="itemName"  /></br></br>
            TESTESTPrice £:
            <input type="text" id="price" name="price"  /></br></br>
            Quantity:
            <input type="text" id="quantity" name="quantity"  /></br></br>
            Description:
            <input type="text" id="description" name="description"  /></br></br>
            Image name:
            <input type="text" id="image" name="image"  /></br></br>
            <input  name="submit" id="submit" type="submit" value="Add Item" />
            <input  name="modify" id="submit" type="submit" value="Modify Item" />

<!--            upload picture-->
            <form action="upload_image.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="imageToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>

        </form>

    </div>
    <!--End Maint content -->

    <!--Side Bar content here-->




    <!--End side bar content -->

