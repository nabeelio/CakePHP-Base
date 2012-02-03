<?php
/**
 * @author Nabeel Shahzad <nshahzad@gmail.com>
 * @license MIT
 * @web http://github.com/nshahzad
 *
 */
 
class DATABASE_CONFIG {

	public $default = null;

	/**
	 * Handle which database connection strings to use...
	 * 
	 * @param string $env dev/stage/live (optional)
	 * @return none
	 */
	public function __construct($env = '') {

		$this->default = array(
			'datasource' => 'Database/Mysql',
			'persistent' => false,
			'host' => JSONConfigPuller::get('mysql', 'host'),
			'login' => JSONConfigPuller::get('mysql', 'login'),
			'password' => JSONConfigPuller::get('mysql', 'password'),
			'database' => JSONConfigPuller::get('mysql', 'database'),
			'prefix' => '',
		);

	}
}