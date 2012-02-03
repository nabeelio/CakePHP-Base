<?php
/* Location Fixture generated on: 2010-06-28 13:06:28 : 1277744428 */
class LocationFixture extends CakeTestFixture {
	var $name = 'Location';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'location' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'state' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2, 'key' => 'index'),
		'zip' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6),
		'logo' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 30),
		'lat' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '8,6'),
		'lng' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '9,6'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'state' => array('column' => 'state', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'location' => 'Lorem ipsum dolor sit amet',
			'state' => '',
			'zip' => 1,
			'logo' => 'Lorem ipsum dolor sit amet',
			'lat' => 1,
			'lng' => 1
		),
	);
}
?>