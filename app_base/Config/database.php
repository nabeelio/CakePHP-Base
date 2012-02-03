<?php
/**
 * @author Nabeel Shahzad <nabeel@dormillo.com>
 * @copyright dormillo.com (c) 2011 all rights reserved
 * @license property of dormillo.com
 * 
 * // <!-- phpDesigner :: Timestamp [9/8/2011 12:35:47 PM] -->
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
			'host' => DormilloSettings::get('mysql', 'host'),
			'login' => DormilloSettings::get('mysql', 'login'),
			'password' => DormilloSettings::get('mysql', 'password'),
			'database' => DormilloSettings::get('mysql', 'database'),
			'prefix' => '',
		);

	}
}