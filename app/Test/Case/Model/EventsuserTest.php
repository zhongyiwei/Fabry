<?php
App::uses('Eventsuser', 'Model');

/**
 * Eventsuser Test Case
 *
 */
class EventsuserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.eventsuser'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Eventsuser = ClassRegistry::init('Eventsuser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Eventsuser);

		parent::tearDown();
	}

}
