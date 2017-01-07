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
<!--Maint content here-->

<div class="panel-body">
    <div class="page-header">
        <h3>Please register  <small></small> </h3>
    </div>
    <!--        <img  class="featuredImg" src="img/idear.jpg"  width="100%" alt="">-->
<!--    <p>Paragraph</p>-->
<!--    <h4>A heading</h4>-->
<!--    <p>paragraph</p>-->
    <?php
    session_start();
    require 'connect.php';
   // require 'current_user.php';

    if(isset($_POST['submit'])){
//if($_POST['submit']){
        $ScName=strip_tags($_POST['ScName']);
        $fname=strip_tags($_POST['fname']);
        $lname=strip_tags($_POST['lname']);
        $email=strip_tags($_POST['email']);
        $password=strip_tags($_POST['password']);
        $password2=strip_tags($_POST['password2']);

        $error = array();

        if(empty($email) or !filter_var($email,FILTER_SANITIZE_EMAIL))
        {
            $error[] = "Email id is empty or invalid";
        }
        if(empty($password)){
            $error[] = "Please enter password";
        }
        if(empty($password2)){
            $error[] = "Please enter Confirm password";
        }
        if($password != $password2){
            $error[] = "Password and Confirm password are not matching";
        }
        if(empty($fname)){
            $error[] = "Enter first name";
        }
        if(empty($lname)){
            $error[] = "Enter last name";
        }

        if (count($error) == 0){
            //database configuration
            $host = 'localhost';
            $database_name = 'shopping_website';
            $database_user_name = '';
            $database_password = '';
            $collection_name ='users';

            $connection=new MongoClient();
            echo "Connection to database successfully" . "<br>";
            echo "<br>";

            if($connection){

                //connecting to database
                $database=$connection->$database_name;

                //connect to specific collection
                $collection=$database->$collection_name;


                $query=array('email'=>$email);
                //checking for existing user
                $count=$collection->findOne($query);

                if(!count($count)){
                    //Save the New user
                    $user=array('fname'=>$fname,'lname'=>$lname,'ScName'=>$ScName,'email'=>$email,'password'=>md5($password),'password'=>$password2);
                    $collection->save($user);
                    echo "You are successfully registered.";
                }else{
                    echo "Email is already existed.Please register with another Email id!.";
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

    <form action="registration.php" method="POST">
        <table cellpadding="2" cellspacing="2" border="0">
            <tr>
                <td>Screen Name:</td>
                <td><input type="text" id="ScName" name="ScName"></td>
            </tr>
            <tr>
                <td>First Name:</td>
                <td><input type="text" id="fname" name="fname" ></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" id="lname" name="lname"  ></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" id="email" name="email" ></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" id="password" name="password" ></td>
            </tr>
            <tr>
                <td> Confirm Password:</td>
                <td><input type="password" id="password2" name="password2" ></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input  name="submit" id="submit" type="submit" value="register" ></td>
            </tr>




        </table>
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
