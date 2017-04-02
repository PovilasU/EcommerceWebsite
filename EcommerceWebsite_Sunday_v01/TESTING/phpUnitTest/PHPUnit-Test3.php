<?php
require_once('../simpletest/autorun.php');
require_once('../simpletest/web_tester.php');


class SimpleFormTests extends WebTestCase {

  function testDoesContactPageExist() {
    $this->get('http://localhost/ecommercewebsite/index_version_02.php');
    $this->assertResponse(200); 
  }

}




?>