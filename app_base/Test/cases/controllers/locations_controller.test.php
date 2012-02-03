<?php
/* Locations Test cases generated on: 2010-06-25 17:06:57 : 1277501757*/
App::import('Controller', 'Locations');

class TestLocationsController extends LocationsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class LocationsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.location', 'app.listing', 'app.user', 'app.group', 'app.users_listing', 'app.users_search', 'app.category', 'app.flag', 'app.listing_images', 'app.listing_image', 'app.listing_reported', 'app.listing_tags', 'app.listing_tag', 'app.listing_views', 'app.listing_view');

	function startTest() {
		$this->Locations =& new TestLocationsController();
		$this->Locations->constructClasses();
	}

	function endTest() {
		unset($this->Locations);
		ClassRegistry::flush();
	}

	function testAdminIndex() {

	}

	function testAdminView() {

	}

	function testAdminAdd() {

	}

	function testAdminEdit() {

	}

	function testAdminDelete() {

	}

}
?>