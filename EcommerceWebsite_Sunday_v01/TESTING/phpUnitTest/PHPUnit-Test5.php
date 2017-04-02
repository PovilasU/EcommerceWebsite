<?php
require_once('../simpletest/autorun.php');
require_once('../simpletest/web_tester.php');




class TestOfAbout extends WebTestCase {
    function testOurAboutPageGivesFreeReignToOurEgo() {
        $this->get('../../index_version_02.php');
        $this->click('cart');
        $this->assertTitle('DVD Shopping Site');
        $this->assertText('Shopping Cart');
    }
}
?>








