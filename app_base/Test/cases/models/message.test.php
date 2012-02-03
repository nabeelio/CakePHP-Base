<?php
/* Message Test cases generated on: 2011-02-28 09:44:00 : 1298904240*/
App::import('Model', 'Message');

class MessageTestCase extends CakeTestCase {
	var $fixtures = array('app.message', 'app.user', 'app.location', 'app.state', 'app.listing', 'app.category', 'app.flag', 'app.listing_images', 'app.listing_reported', 'app.listing_views', 'app.group', 'app.users_search', 'app.thread', 'app.user_thread');

	function startTest() {
		$this->Message =& ClassRegistry::init('Message');
	}

	function endTest() {
		unset($this->Message);
		ClassRegistry::flush();
	}

}
?>