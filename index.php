<?php
session_start();
//Include the PHP functions to be used on the page
include('common.php');
//Output header and navigation
outputHeader("E-Commerce Website");
outputBannerNavigation("Home");
?>
<?php
outputMainPanel();
?>
<!--Maint content here-->

    <div class="panel-body">
        <div class="page-header">
            <h3>Whatever you want! <small>Posted on january 4th</small> </h3>
        </div>
        <img  class="featuredImg" src="img/idear.jpg"  width="100%" alt="">
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        <h4>A heading</h4>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

        <!--Items table-->
        <table align="center" cellpadding="2" cellspacing="2" border="1">
            <tr>
<!--                <th>Id</th>-->
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
<!--Side Bar here-->
    <a href="#" class="list-group-item">
        <h4 class="list-group-item-heading" >Lorem ipsum</h4>
        <p class="list-group-item-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electron</p>
    </a>
    <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading" >Lorem ipsum</h4>
    <p class="list-group-item-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electron</p>
    </a>


<!--End side bar-->
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