<?php
/**
 * @author Nabeel Shahzad <nshahzad@gmail.com>
 * @license MIT
 * @web http://github.com/nshahzad
 *
 */

class FrontpageController extends AppController {

	public function beforeFilter() {
		$this->Auth->allow('index');
		parent::beforeFilter();
	}

	public function index() {

	}
}