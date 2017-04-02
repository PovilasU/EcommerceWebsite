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
        $phone=strip_tags($_POST['phone']);
        $country=strip_tags($_POST['country']);
        $city=strip_tags($_POST['city']);
        $street=strip_tags($_POST['street']);
        $house=strip_tags($_POST['house']);
        $post=strip_tags($_POST['post']);
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
        if(empty($phone)){
            $error[] = "Enter phone number";
        }
        if(empty($country)){
            $error[] = "Enter country";
        }
        if(empty($city)){
            $error[] = "Enter city";
        }
        if(empty($street)){
            $error[] = "Enter streed adress";
        }
        if(empty($house)){
            $error[] = "Enter house number";
        }
        if(empty($post)){
            $error[] = "Enter post code";
        }

        if (count($error) == 0){
            //database configuration
            $host = 'localhost';
            $database_name = 'ecommerce';
            $database_user_name = '';
            $database_password = '';
            $collection_name ='customers';

            $connection=new MongoClient();
            //echo "Connection to database successfully" . "<br>";
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
                    $user=array('fname'=>$fname,'lname'=>$lname,'username'=>$ScName,'email'=>$email,'password'=>md5($password),'password'=>$password2);
                    $collection->save($user);
                    echo '<script type="text/javascript">alert(login);</script>';
                    echo '<script type="text/javascript">window.location = "login.php";</script>';


                }else{
                    echo "This E-mail is already associated with another account. Please register with another E-mail or login to the associated account.";
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
                <td>Username:</td>
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
                <td>Phone number</td>
                <td><input type="text" id="phone" name="phone"  ></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><input type="text" id="country" name="country"  ></td>
            </tr>
            <tr>
                <td>City</td>
                <td><input type="text" id="city" name="city"  ></td>
            </tr>
            <tr>
            <tr>
                <td>Street address </td>
                <td><input type="text" id="street" name="street"  ></td>
            </tr>
            <tr>
                <td>House number</td>
                <td><input type="text" id="house" name="house"  ></td>
            </tr>
            <tr>
                <td>Post Code</td>
                <td><input type="text" id="post" name="post"  ></td>
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