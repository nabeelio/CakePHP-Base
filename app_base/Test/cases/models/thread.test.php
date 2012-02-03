<?php
/* Thread Test cases generated on: 2011-02-28 09:46:16 : 1298904376*/
App::import('Model', 'Thread');

class ThreadTestCase extends CakeTestCase {
	var $fixtures = array('app.thread', 'app.listing', 'app.user', 'app.location', 'app.state', 'app.group', 'app.users_search', 'app.category', 'app.flag', 'app.listing_images', 'app.listing_reported', 'app.listing_views', 'app.user_thread', 'app.message');

	function startTest() {
		$this->Thread =& ClassRegistry::init('Thread');
	}

	function endTest() {
		unset($this->Thread);
		ClassRegistry::flush();
	}

}
?>