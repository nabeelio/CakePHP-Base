<?php
/* User Fixture generated on: 2010-06-29 18:06:48 : 1277849088 */
class UserFixture extends CakeTestFixture {
	var $name = 'User';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'location_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'index'),
		'group_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 20),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'password' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'salt' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'address1' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'address2' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'state' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 2),
		'town' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'zipcode' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 6),
		'openid' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'timezone' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '5,1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'last_login_date' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'active' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'ipaddress' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'listing_count' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_users_campuses' => array('column' => 'location_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'location_id' => 1,
			'group_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'salt' => 'Lorem ipsum dolor sit amet',
			'address1' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'address2' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'state' => '',
			'town' => 'Lorem ipsum dolor sit amet',
			'zipcode' => 'Lore',
			'openid' => 'Lorem ipsum dolor sit amet',
			'timezone' => 1,
			'created' => '2010-06-29 18:04:48',
			'last_login_date' => '2010-06-29 18:04:48',
			'active' => 1,
			'ipaddress' => 1,
			'listing_count' => 1
		),
	);
}
?>