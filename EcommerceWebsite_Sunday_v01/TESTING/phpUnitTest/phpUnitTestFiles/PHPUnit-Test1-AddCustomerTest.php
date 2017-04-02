<?php 



//Include SimpleTest code


require_once('../simpletest/autorun.php');
require_once('../simpletest/web_tester.php');
//Include utility funtions to help us with the test
require_once('db_tools.php');

// require_once('add_customer.php');

//Include the file that we are testing
require_once('../db-interface/db_interface.php');


class AddCustomerTest extends UnitTestCase {
	function testAddCustomer() {
		$email = "povilas@gmail.com";

		//Delete all customers with this email
		while(customerExists($email)){
			deleteCustomer($email);
		}

		//Call function to add customer
		addCustomer("povilas", $email, "1234");

		// Check that customer has been added

		$this->assertTrue(customerExists($email));

		//Call function to remove test customer from database
		deleteCustomer($email);
	}
}

