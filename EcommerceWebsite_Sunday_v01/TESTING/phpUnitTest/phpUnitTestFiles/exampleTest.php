<?php 
require_once ('../simpletest/autorun.php');

// class BooleanTest extends UnitTestCase {
// 	function testTruth() {
// 		$myVar = true;
// 		$this->assertFalse($myVar);
// 	}
//  }

 class StringTest extends UnitTestCase {
 	function testString(){
 		$myVar = "Sunshine";
 		$this->assertEqual($myVar, "Sunshine");
 	}
 }


class BooleanTest extends UnitTestCase {
	function testTruth2() {
		$myVar = false;
		$this->assertFalse($myVar);
	}
 }


 ?>
