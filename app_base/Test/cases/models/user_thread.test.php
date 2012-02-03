<?php
/* UserThread Test cases generated on: 2011-02-28 09:48:33 : 1298904513*/
App::import('Model', 'UserThread');

class UserThreadTestCase extends CakeTestCase {
	var $fixtures = array('app.user_thread', 'app.thread', 'app.listing', 'app.user', 'app.location', 'app.state', 'app.group', 'app.users_search', 'app.category', 'app.flag', 'app.listing_images', 'app.listing_reported', 'app.listing_views', 'app.message');

	function startTest() {
		$this->UserThread =& ClassRegistry::init('UserThread');
	}

	function endTest() {
		unset($this->UserThread);
		ClassRegistry::flush();
	}

}
?>