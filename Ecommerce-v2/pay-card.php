<?php
//session_start();
//Include the PHP functions to be used on the page
include('common.php');
//Output header and navigation
outputHeader("E-Commerce Website");
outputTopHeader();
outputBannerNavigation("Pay");
?>

<?php
outputMainPanel();
?>
<!--Maint content here-->

<div class="panel-body">
    <div class="page-header">
        <h3>Payment Page<small></small> </h3>
    </div>
    <!--        <img  class="featuredImg" src="img/idear.jpg"  width="100%" alt="">-->
    <!--        <p>Paragraph</p>-->
    <!--        <h4>A heading</h4>-->
    <!--       <p>paragraph</p>-->
    <?php
    session_start();
    require 'connect.php';
    require 'current_user.php';

    ?>

    <?php
    // define variables and set to empty values
    $firstNameErr = $lastNameErr = $streetAddressErr =  $cityErr = $stateErr = $postCodeErr = $countryErr = $phoneErr =
    $creditCardNumberErr = $expirityDateErr = $emailErr =  "";
    $firstName = $lastName = $streetAddress = $streeAddress2 =  $city = $state = $postCode = $country =
    $phone = $creditCardNumber = $expirityDate =  $email = $specialNotes = "";
    $error = array();

    if(isset($_POST['submit'])) {
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["firstName"])) {
            $firstNameErr = "First name is required";
            $error[]=  "First name is required";
        } else {
            $firstName = test_input($_POST["firstName"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
                $firstNameErr = "Only letters and white space allowed";
                $error[] =  "Only letters and white space allowed";

            }
        }

        if (empty($_POST["lastName"])) {
            $lastNameErr = "Last name is required";
            $error[]=  "Last name is required";
        } else {
            $lastName = test_input($_POST["lastName"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
                $lastNameErr = "Only letters and white space allowed";
                $error[] =  "Only letters and white space allowed";

            }
        }

        if (empty($_POST["streetAddress"])) {
            $streetAddressErr = "Street address is required";
            $error[]=  "Street address is required";
        } else {
            $streetAddress = test_input($_POST["streetAddress"]);

        }

        if (empty($_POST["streetAddress2"])) {
            $streetAddress2Err = "Street address (2) is required";
            $error[]=  "Street address (2) is required";
        } else {
            $streetAddress2 = test_input($_POST["streetAddress2"]);

        }

        if (empty($_POST["city"])) {
            $cityErr = "City is required";
            $error[]=  "City is required";
        } else {
            $city = test_input($_POST["city"]);

        }

        if (empty($_POST["state"])) {
            $stateErr = "State is required";
            $error[]=  "State is required";
        } else {
            $state = test_input($_POST["state"]);
        }
        if (empty($_POST["postCode"])) {
            $postCodeErr = "Zip/Post Code is required";
            $error[] = "Zip/Post Code is required";
        } else {
            $postCode = test_input($_POST["postCode"]);
        }
        if (empty($_POST["country"])) {
            $countryErr = "Country is required";
            $error[]=  "Country is required";
        } else {
            $country = test_input($_POST["country"]);
        }

        if (empty($_POST["phone"])) {
            $phoneErr = "Phone number is required";
            $error[]=  "Phone number is required";
        } else {
            $phone = test_input($_POST["phone"]);
        }

        if (empty($_POST["creditCardNumber"])) {
            $creditCardNumberErr = "Bank card number is required";
            $error[]=  "Bank card number is required";
        } else {
            $creditCardNumber = test_input($_POST["creditCardNumber"]);
        }

        if (empty($_POST["expirityDate"])) {
            $expirityDateErr = "Expirity date is required";
            $error[]=  "Expirity date  is required";
        } else {
            $expirityDate = test_input($_POST["expirityDate"]);
        }


        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            $error[] = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $error[] = "Invalid email format";
            }
        }

        $specialNotes = test_input($_POST["specialNotes"]);


        if (count($error) == 0){

            $host = 'localhost';
            $database_name = 'shopping_website';
            $database_user_name = '';
            //database configuration        $database_password = '';
            $collection_name ='paid_orders_test';

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

                    //   $order=array('firstName'=>$firstName,'email'=>$email);
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
            // DO nothing
            //Displaying the error
            //   foreach($error as $err){
            //        echo $err.'</br>';
            // }
        }




    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>


    <style>
        .error {color: #FF0000;}
    </style>
    <h2>Please enter card details</h2>
    <p><span class="error">* required field.</span></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table cellpadding="2" cellspacing="2" border="0">
            <tr bgcolor="#E5E5E5">
                <td height="22" colspan="3" align="left" valign="middle"><strong>&nbsp;Billing Information (required)</strong></td>
            </tr>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="firstName"></td>
                <td><span class="error">* <?php echo $firstNameErr;?></span></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="lastName"></td>
                <td><span class="error">* <?php echo $lastNameErr;?></span></td>
            </tr>
            <tr>
                <td>Street Address:</td>
                <td><input type="text" name="streetAddress"></td>
                <td><span class="error">* <?php echo $streetAddressErr;?></span></td>
            </tr>
            <tr>
                <td>Street Address (2):</td>
                <td><input type="text" name="streetAddress2"></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><input type="text" name="city"></td>
                <td><span class="error">* <?php echo $cityErr;?></span></td>
            </tr>
            <tr>
                <td>State/Province:</td>
                <td><input type="text" name="state"></td>
                <td><span class="error">* <?php echo $stateErr;?></span></td>
            </tr>
            <tr>
                <td>Zip/Post Code:</td>
                <td><input type="text" name="postCode"></td>
                <td><span class="error">* <?php echo $postCodeErr;?></span></td>
            </tr>
            <tr>
                <td>Country:</td>
                <td><input type="text" name="country"></td>
                <td><span class="error">* <?php echo $countryErr;?></span></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><input type="text" name="phone"></td>
                <td><span class="error">* <?php echo $phoneErr;?></span></td>
            </tr>
            <tr>
                <td height="22" colspan="3" align="left" valign="middle">&nbsp;</td>
            </tr>
            <tr bgcolor="#E5E5E5">
                <td height="22" colspan="3" align="left" valign="middle"><strong>&nbsp;Credit Card (required)</strong></td>
            </tr>
            <tr>
                <td>Bank Card Number:</td>
                <td><input type="text" name="creditCardNumber"></td>
                <td><span class="error">*<?php echo $creditCardNumberErr;?></span></td>
            </tr>
            <tr>
                <td>Expirity Date:</td>
                <td><input type="text" name="expirityDate"></td>
                <td><span class="error">*<?php echo $expirityDateErr;?></span></td>
            </tr>
            <tr>
                <td height="22" align="right" valign="middle">Expiry Date:</td>
                <td colspan="2" align="left">
                    <SELECT NAME="CCExpiresMonth" >
                        <OPTION VALUE="" SELECTED>--Month--
                        <OPTION VALUE="01">January (01)
                        <OPTION VALUE="02">February (02)
                        <OPTION VALUE="03">March (03)
                        <OPTION VALUE="04">April (04)
                        <OPTION VALUE="05">May (05)
                        <OPTION VALUE="06">June (06)
                        <OPTION VALUE="07">July (07)
                        <OPTION VALUE="08">August (08)
                        <OPTION VALUE="09">September (09)
                        <OPTION VALUE="10">October (10)
                        <OPTION VALUE="11">November (11)
                        <OPTION VALUE="12">December (12)
                    </SELECT> /
                    <SELECT NAME="CCExpiresYear">
                        <OPTION VALUE="" SELECTED>--Year--
                        <OPTION VALUE="04">2004
                        <OPTION VALUE="05">2005
                        <OPTION VALUE="06">2006
                        <OPTION VALUE="07">2007
                        <OPTION VALUE="08">2008
                        <OPTION VALUE="09">2009
                        <OPTION VALUE="10">2010
                        <OPTION VALUE="11">2011
                        <OPTION VALUE="12">2012
                        <OPTION VALUE="13">2013
                        <OPTION VALUE="14">2014
                        <OPTION VALUE="15">2015
                    </SELECT>
                </td>
            </tr>
            <tr>
                <td height="22" colspan="3" align="left" valign="middle">&nbsp;</td>
            </tr>
            <tr bgcolor="#E5E5E5">
                <td height="22" colspan="3" align="left" valign="middle"><strong>&nbsp;Additional Information</strong></td>
            </tr>
            <tr>
                <td>Contact E-mail:</td>
                <td><input type="text" name="email""></td>
                <td><span class="error">* <?php echo $emailErr;?></span></td>
            </tr>
            <tr>
                <td>Special Notes:</td>
                <td><input type="text" name="specialNotes"></td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="Send Secure Form"> </td>
            </tr>
        </table>
    </form>



</div>
<!--End Maint content -->






<?php
//output information bar
outputInformation();
outputFooter();
?>