<?php
require_once('../simpletest/autorun.php');
require_once('../simpletest/web_tester.php');


class SimpleFormTests extends WebTestCase {

function testIsProperFormSubmissionSuccessful() {

  $this->get('http://localhost/ecommercewebsite/registration.php');
  $this->assertResponse(200);

  $this->setField("ScName", "povilas");
  $this->setField("fname", "povilas");
  $this->setField("lName", "nesvarbu");
  $this->setField("country", "GB");
  $this->setField("city", "London");
  $this->setField("password", "123");
  

  $this->clickSubmit("submit");

  $this->assertResponse(200);
  $this->assertText("This E-mail is already associated with another account. Please register with another E-mail or login to the associated account.");

}
  function testDoesContactPageExist() {
    $this->get('http://localhost/ecommercewebsite/registration.php');
    $this->assertResponse(200); 
  }

}




?>