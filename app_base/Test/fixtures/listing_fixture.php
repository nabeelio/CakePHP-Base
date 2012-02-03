<?php
/* Listing Fixture generated on: 2010-06-22 22:06:21 : 1277258481 */
class ListingFixture extends CakeTestFixture {
	var $name = 'Listing';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 20, 'key' => 'index'),
		'category_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'location_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'flag_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'subject' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'body' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'isbn' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 13),
		'price' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'available' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'imagecount' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'views' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'enabled' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'user_id' => array('column' => 'user_id', 'unique' => 0), 'idx_category_id' => array('column' => 'category_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'category_id' => 1,
			'location_id' => 1,
			'flag_id' => 1,
			'subject' => 'Lorem ipsum dolor sit amet',
			'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'isbn' => 'Lorem ipsum',
			'price' => 1,
			'created' => '2010-06-22 22:01:21',
			'modified' => '2010-06-22 22:01:21',
			'available' => 1,
			'imagecount' => 1,
			'views' => 1,
			'enabled' => 1
		),
	);
}
?>