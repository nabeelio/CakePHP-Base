<?php
/* Flag Test cases generated on: 2010-06-22 21:06:35 : 1277258315*/
App::import('Model', 'Flag');

class FlagTestCase extends CakeTestCase {
	var $fixtures = array('app.flag', 'app.listing');

	function startTest() {
		$this->Flag =& ClassRegistry::init('Flag');
	}

	function endTest() {
		unset($this->Flag);
		ClassRegistry::flush();
	}

}
?>