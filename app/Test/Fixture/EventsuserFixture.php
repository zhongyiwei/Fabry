<?php
/**
 * EventsuserFixture
 *
 */
class EventsuserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'eventsid' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'usersid' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('eventsid', 'usersid'), 'unique' => 1),
			'fk_eventsusers_users1_idx' => array('column' => 'usersid', 'unique' => 0),
			'fk_eventsusers_events1_idx' => array('column' => 'eventsid', 'unique' => 0)
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
			'eventsid' => 1,
			'usersid' => 1
		),
	);

}
