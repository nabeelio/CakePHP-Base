<?php
/* UserMessage Test cases generated on: 2011-02-25 10:59:25 : 1298649565*/
App::import('Model', 'UserMessage');

class UserMessageTestCase extends CakeTestCase {
	var $fixtures = array('app.user_message', 'app.message', 'app.listing', 'app.user', 'app.location', 'app.state', 'app.group', 'app.users_search', 'app.category', 'app.flag', 'app.listing_images', 'app.listing_reported', 'app.listing_views');

	function startTest() {
		$this->UserMessage =& ClassRegistry::init('UserMessage');
	}

	function endTest() {
		unset($this->UserMessage);
		ClassRegistry::flush();
	}

}
?>