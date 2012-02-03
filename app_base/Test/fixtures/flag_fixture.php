<?php
/* Flag Fixture generated on: 2010-06-22 21:06:35 : 1277258315 */
class FlagFixture extends CakeTestFixture {
	var $name = 'Flag';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'text' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'blocked' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'text' => 'Lorem ipsum dolor sit amet',
			'blocked' => 1
		),
	);
}
?>