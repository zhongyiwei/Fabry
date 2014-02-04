<?php
App::uses('Medication', 'Model');

/**
 * Medication Test Case
 *
 */
class MedicationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.medication',
		'app.users'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Medication = ClassRegistry::init('Medication');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Medication);

		parent::tearDown();
	}

}
