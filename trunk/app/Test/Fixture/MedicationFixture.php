<?php
/**
 * MedicationFixture
 *
 */
class MedicationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'medicationName' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 70, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'strengthEachPill' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'doseEachTime' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'frequency' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 90, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'users_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'users_id'), 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'fk_medications_users1_idx' => array('column' => 'users_id', 'unique' => 0)
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
			'medicationName' => 'Lorem ipsum dolor sit amet',
			'strengthEachPill' => 'Lorem ip',
			'doseEachTime' => 'Lorem ip',
			'frequency' => 'Lorem ipsum dolor sit amet',
			'users_id' => 1
		),
	);

}
