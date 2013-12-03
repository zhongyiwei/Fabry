<?php
/**
 * BowelFixture
 *
 */
class BowelFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'date' => array('type' => 'date', 'null' => false, 'default' => null),
		'count' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'comment' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 90, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'users_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'users_id'), 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'fk_bowels_users1_idx' => array('column' => 'users_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'date' => '2013-10-03',
			'count' => 1,
			'comment' => 'Lorem ipsum dolor sit amet',
			'users_id' => 1
		),
	);

}
