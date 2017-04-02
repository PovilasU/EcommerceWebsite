<?php 
require_once ('../simpletest/autorun.php');

class AddCustomerTest extends UnitTestCase {
	function testAddCustomer() {
		$email = "test@test.com";

		//Delete all customers with this email
		while(customerExists($email)){
			deleteCustomer($email);
		}

		//Call function to add customer
		addCustomer("Povilas", $email, "1234");

		//Check that customer has been added
		$this->assertTrue(customerExists($email));

		//Call function to remove test customer from database
		deleteCustomer($email);
	}
}



 ?>