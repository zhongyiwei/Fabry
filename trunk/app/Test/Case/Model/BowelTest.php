<?php
App::uses('Bowel', 'Model');

/**
 * Bowel Test Case
 *
 */
class BowelTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bowel',
		'app.users'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Bowel = ClassRegistry::init('Bowel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bowel);

		parent::tearDown();
	}

}
