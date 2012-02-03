<?php
/* UserThread Fixture generated on: 2011-02-28 09:48:33 : 1298904513 */
class UserThreadFixture extends CakeTestFixture {
	var $name = 'UserThread';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'thread_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'hasnew' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'issender' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'thread_id' => 1,
			'user_id' => 1,
			'hasnew' => 1,
			'issender' => 1
		),
	);
}
?>