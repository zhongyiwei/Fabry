<?php
App::uses('Pain', 'Model');

/**
 * Pain Test Case
 *
 */
class PainTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pain',
		'app.users'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pain = ClassRegistry::init('Pain');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pain);

		parent::tearDown();
	}

}
