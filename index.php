<?php
//session_start();
//Include the PHP functions to be used on the page
include('common.php');
//Output header and navigation
outputHeader("E-Commerce Website");
outputBannerNavigation("Home");
outputMainBanner();
?>
<?php
outputMainPanel();
?>
<!--Maint content here-->

    <div class="panel-body">
        <div class="page-header">
            <h3>Home Page <small></small> </h3>
        </div>
<!--        <img  class="featuredImg" src="img/idear.jpg"  width="100%" alt="">-->
<!--        <p>Paragraph</p>-->
<!--        <h4>A heading</h4>-->
<!--       <p>paragraph</p>-->
        <?php
        session_start();
        require 'connect.php';
      //  require 'current_user.php';
        $collection = $db->products;
        $cursor = $collection->find();

        ?>
        <!--Items table-->
        <table cellpadding="2" cellspacing="2" border="1">
            <tr>
<!--             //   <th>Id</th>-->
                <th>Name</th>
                <th>Price £</th>
                        <th>Description</th>
                <th>Buy</th>
            </tr>

            <?php foreach ($cursor as $product) {?>

                <tr>
<!--                    <td>--><?php //echo $product["_id"] ; ?><!--</td>-->
                    <td><?php echo $product["name"] ; ?></td>
                    <td><?php echo $product["price"] ; ?></td>
                    <!--            <td>--><?php //echo $product["quantity"] ; ?><!--</td>-->
                                <td><?php echo $product["description"] ; ?></td>
                    <td><a href="cart.php?_id=<?php echo $product["_id"]; ?>">Order Now</a> </td>
                </tr>

            <?php } ?>

        </table>


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