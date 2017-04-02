<?php
require_once('../simpletest/autorun.php');
require_once('../simpletest/web_tester.php');


class SimpleFormTests extends WebTestCase {



  function testDoesContactPageExist() {
    $this->get('http://localhost/ecommercewebsite/cart.php');
    $this->assertResponse(200); 
  }

}




?>