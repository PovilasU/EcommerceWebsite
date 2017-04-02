<?php
require_once('../simpletest/autorun.php');
require_once('../simpletest/web_tester.php');


class SimpleFormTests extends WebTestCase {

function testIsProperFormSubmissionSuccessful() {

  $this->get('http://localhost/ecommercewebsite/login.php');
  //http://localhost/ecommercewebsite/login.php
  $this->assertResponse(200);

  $this->setField("username", "povilas");
  $this->setField("password", "123");
  

  $this->clickSubmit("bttLogin");

  $this->assertResponse(200);
  $this->assertText("invalid account");

}
  function testDoesContactPageExist() {
    $this->get('http://localhost/ecommercewebsite/login.php');
    $this->assertResponse(200); 
  }

}




?>