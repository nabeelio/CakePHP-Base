<?php
/* Category Fixture generated on: 2010-06-25 17:06:33 : 1277501733 */
class CategoryFixture extends CakeTestFixture {
	var $name = 'Category';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'active' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'hasisbn' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'enabled' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => array('id', 'parent_id'), 'unique' => 1), 'fk_categories_categories1' => array('column' => 'parent_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'parent_id' => 1,
			'lft' => 1,
			'rght' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'hasisbn' => 1,
			'enabled' => 1
		),
	);
}
?>