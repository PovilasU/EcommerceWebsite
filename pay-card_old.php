<?php
session_start();
require 'connect.php';
require 'current_user.php';


if(isset($_POST['submit'])){
    // Pay Card form variables
    //$firstName=strip_tags($_POST['firstName']);
    $firstName = test_input($_POST["firstName"]);

    $lastName=strip_tags($_POST['lastName']);
    $streetAddress=strip_tags($_POST['streetAddress']);
    $streeAddress2=strip_tags($_POST['streetAddress2']);
    $city=strip_tags($_POST['city']);
    $state=strip_tags($_POST['state']);
    $postCode=strip_tags($_POST['postCode']);
    $country=strip_tags($_POST['country']);
    $phone=strip_tags($_POST['phone']);
    $creditCardNumber=strip_tags($_POST['creditCardNumber']);
    $expirityDate=strip_tags($_POST['expirityDate']);
   // $emailBeforeValidation=($_POST['email']);
    // Remove all illegal characters from email
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $specialNotes=strip_tags($_POST['specialNotes']);




    $error = array();

    // check name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
        $error[] = "First Name is  invalid";
        $nameError = "Only letters and white space allowed";
    }


    if(empty($firstName) )
    {
        $error[] = "First Name is empty or invalid";
    }
    if(empty($lastName) )
    {
        $error[] = "Last Name is empty or invalid";
    }

    if(empty($streetAddress) )
    {
        $error[] = "Streed Address is empty or invalid";
    }
    if(empty($city) )
    {
        $error[] = "City is empty or invalid";
    }
    if(empty($state) )
    {
        $error[] = "State/Province is empty or invalid";
    }
    if(empty($postCode) )
    {
        $error[] = "First Name is empty or invalid";
    }
    if(empty($country) )
    {
        $error[] = "Country is empty or invalid";
    }
    if(empty($phone) )
    {
        $error[] = "Phone is empty or invalid";
    }
    if(empty($creditCardNumber) )
    {
        $error[] = "Credit Card Number is empty or invalid";
    }
    if(empty($expirityDate) )
    {
        $error[] = "Expirity date is empty or invalid";
    }
    // Validate e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    } else {
        echo("$email is not a valid email address");
        $error[] = "Email is empty or invalid";
    }



    if (count($error) == 0){
        //database configuration
        $host = 'localhost';
        $database_name = 'shopping_website';
        $database_user_name = '';
        $database_password = '';
        $collection_name ='paid_orders';

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
//                $user=array('fname'=>$fname,'lname'=>$lname,'ScName'=>$ScName,
//                    'email'=>$email,'password'=>md5($password),'password'=>$password2);

                $order=array('firstName'=>$firstName,'lastName'=>$lastName,'streetAddress'=>$streetAddress,
                    'streeAddress2'=>$streeAddress2,'city'=>$city, 'state'=>$state, 'postCode'=>$postCode,
                    'country'=>$country,'phone'=>$phone, 'creditCardNumber'=>$creditCardNumber,
                    'expirityDate'=>$expirityDate, 'email'=>$email, 'specialNotes'=>$specialNotes);

                $collection->save($order);
                echo "Payment Successful.";
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

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<html>
<head>

    <title>
        Registration
    </title>
</head>
<body>
<!-- Navigation section -->
<div class="navigation">
    <a class="selected" href="index.php">Home</a>
    <a href="shop.php">Shop</a>
    <a href="cart.php">Cart</a>
    <a href="registration.php">Registration</a>
    <a href="login.php">Login</a>
    <a href="logout.php?action=logout">Logout</a>
</div>



<form name="myRegistrationForm" action="pay-card_old.php" method="POST" onsubmit="return checkRegistrationForm(this);" >
    <table cellpadding="2" cellspacing="2" border="0">
        <tr bgcolor="#E5E5E5">
            <td height="22" colspan="3" align="left" valign="middle"><strong>&nbsp;Billing Information (required)</strong></td>
        </tr>

        <tr>
            <td>First Name:</td>
            <td><input  class="input" type="text" id="firstName" name="firstName"></td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td><input type="text" id="lastName" name="lastName" ></td>
        </tr>
        <tr>
            <td>Street Address:</td>
            <td><input type="text" id="streetAddress" name="streetAddress"  ></td>
        </tr>
        <tr>
            <td>Street Address (2):</td>
            <td><input type="text" id="sreetAddress2" name="streetAddress2" ></td>
        </tr>
        <tr>
            <td>City</td>
            <td><input type="text" id="city" name="city" ></td>
        </tr>
        <tr>
            <td>State/Province:</td>
            <td><input type="text" id="state" name="state" ></td>
        </tr>
        <tr>
            <td>Zip/Pos Code:</td>
            <td><input type="text" id="postCode" name="postCode" ></td>
        </tr>
        <tr>
            <td>Country:</td>
            <td><input type="text" id="country" name="country" ></td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td><input type="text" id="phone" name="phone" ></td>
        </tr>
        <tr>
            <td height="22" colspan="3" align="left" valign="middle">&nbsp;</td>
        </tr>
        <tr bgcolor="#E5E5E5">
            <td height="22" colspan="3" align="left" valign="middle"><strong>&nbsp;Credit Card (required)</strong></td>
        </tr>
        <tr>
            <td>Credit Card Number:</td>
            <td><input type="text" id="creditCardNumber" name="creditCardNumber" ></td>
        </tr>
        <tr>
            <td>Expirity Date:</td>
            <td><input type="text" id="expirityDate" name="expirityDate" ></td>
        </tr>
        <tr>
            <td height="22" colspan="3" align="left" valign="middle">&nbsp;</td>
        </tr>
        <tr bgcolor="#E5E5E5">
            <td height="22" colspan="3" align="left" valign="middle"><strong>&nbsp;Additional Information</strong></td>
        </tr>

        <tr>
            <td>Contact Email:</td>
            <td><input type="text" id="email" name="email" ></td>
        </tr>
        <tr>
            <td>Special Notes:</td>
            <td><input type="text" id="specialNotes" name="specialNotes" ></td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td><input  name="submit" id="submit" type="submit" value="Send Secure Form" ></td>
        </tr>




    </table>
</form>


<script type="text/JavaScript" src="js/card_validation.js"></script>
</body>
</html>

