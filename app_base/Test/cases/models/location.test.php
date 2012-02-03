<?php
/* Location Test cases generated on: 2010-06-28 13:06:28 : 1277744428*/
App::import('Model', 'Location');

class LocationTestCase extends CakeTestCase {
	var $fixtures = array('app.location', 'app.listing', 'app.user', 'app.group', 'app.users_listing', 'app.users_search', 'app.category', 'app.flag', 'app.listing_images', 'app.listing_image', 'app.listing_reported', 'app.listing_tags', 'app.listing_tag', 'app.listing_views', 'app.listing_view');

	function startTest() {
		$this->Location =& ClassRegistry::init('Location');
	}

	function endTest() {
		unset($this->Location);
		ClassRegistry::flush();
	}

}
?>