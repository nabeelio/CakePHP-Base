<?php
/* Users Test cases generated on: 2010-06-28 13:06:37 : 1277745037*/
App::import('Controller', 'Users');

class TestUsersController extends UsersController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class UsersControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.user', 'app.location', 'app.listing', 'app.users_listing', 'app.category', 'app.flag', 'app.listing_images', 'app.listing_image', 'app.listing_reported', 'app.listing_tags', 'app.listing_tag', 'app.listing_views', 'app.listing_view', 'app.group', 'app.users_search');

	function startTest() {
		$this->Users =& new TestUsersController();
		$this->Users->constructClasses();
	}

	function endTest() {
		unset($this->Users);
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