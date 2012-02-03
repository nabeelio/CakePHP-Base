<?php
/* Listings Test cases generated on: 2010-06-25 17:06:08 : 1277501708*/
App::import('Controller', 'Listings');

class TestListingsController extends ListingsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ListingsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.listing', 'app.user', 'app.location', 'app.group', 'app.users_listing', 'app.users_search', 'app.category', 'app.flag', 'app.listing_images', 'app.listing_image', 'app.listing_reported', 'app.listing_tags', 'app.listing_tag', 'app.listing_views', 'app.listing_view');

	function startTest() {
		$this->Listings =& new TestListingsController();
		$this->Listings->constructClasses();
	}

	function endTest() {
		unset($this->Listings);
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