
<link rel="stylesheet" type="text/css" href="styles.css">
<script src="basket.js"></script>
<?php

require 'connect.php';
require 'current_user.php';

?>


<?php
//Start session management
session_start();

//Find out if session exists
if( array_key_exists("username", $_SESSION) ){
    //  echo 'Session in progress. username=' . $_SESSION["username"];
}
else{
    echo 'Session not started';
    header("Location: login.php");
}

if(array_key_exists('username',$_SESSION) && empty($_SESSION['username'])) {
    echo 'You are not loged in, please register first or login';
    header("Location: login.php");
}
//Output result
echo 'Session started.' ."</br>";
echo 'Loged user=' . $_SESSION["username"]."</br>";
echo 'User ID=' . $_SESSION["_id"];
$customerID=$_SESSION["_id"];


?>

<?php

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
        <h3><small></small> </h3>
    </div>


    <?php

    if(isset($_POST['submit'])) {



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


                    //   $order=array('firstName'=>$firstName,'email'=>$email);
                    $order=array('firstName'=>$firstName);

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




    </form>



</div>
<!--End Maint content -->






<?php
//output information bar
outputInformation();
outputFooter();
?>