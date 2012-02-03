<?php
/* Message Fixture generated on: 2011-02-28 09:43:59 : 1298904239 */
class MessageFixture extends CakeTestFixture {
	var $name = 'Message';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'comment' => 'This is the author\'s user_id'),
		'thread_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'comment' => 'this is the listing_id this message refers to'),
		'body' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 500, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'parent_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'thread_id' => 1,
			'body' => 'Lorem ipsum dolor sit amet',
			'created' => '2011-02-28 09:43:59',
			'parent_id' => 1,
			'lft' => 1,
			'rght' => 1
		),
	);
}
?>