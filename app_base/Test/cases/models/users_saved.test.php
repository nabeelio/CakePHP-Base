<?php
/* UsersSaved Test cases generated on: 2010-06-29 17:06:35 : 1277845955*/
App::import('Model', 'UsersSaved');

class UsersSavedTestCase extends CakeTestCase {
	var $fixtures = array('app.users_saved', 'app.user', 'app.location', 'app.states', 'app.listing', 'app.users_listing', 'app.category', 'app.flag', 'app.listing_images', 'app.listing_image', 'app.listing_reported', 'app.listing_tags', 'app.listing_tag', 'app.listing_views', 'app.listing_view', 'app.group', 'app.users_search');

	function startTest() {
		$this->UsersSaved =& ClassRegistry::init('UsersSaved');
	}

	function endTest() {
		unset($this->UsersSaved);
		ClassRegistry::flush();
	}

}
?>