<?php
/* UsersSaved Fixture generated on: 2010-06-29 17:06:38 : 1277848358 */
class UsersSavedFixture extends CakeTestFixture {
	var $name = 'UsersSaved';
	var $table = 'users_saved';

	var $fields = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'listing_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => 'user_id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'user_id' => 1,
			'listing_id' => 1
		),
	);
}
?>