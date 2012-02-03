<?php
/* State Test cases generated on: 2011-01-08 11:01:36 : 1294505316*/
App::import('Model', 'State');

class StateTestCase extends CakeTestCase {
	var $fixtures = array('app.state');

	function startTest() {
		$this->State =& ClassRegistry::init('State');
	}

	function endTest() {
		unset($this->State);
		ClassRegistry::flush();
	}

}
?>