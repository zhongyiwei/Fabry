<?php
App::uses('AppModel', 'Model');
/**
 * Contact Model
 *
 * @property Users $Users
 */
class Contact extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'centerName' => array(
			//'notempty' => array(
				//'rule' => array('notempty'),
				//'message' => 'Please Enter your treatment center.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		),
		'address' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the number / street name',				
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'doctor' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the doctor name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'suburb' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter the suburb.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'state' => array(
			//'notempty' => array(
			//'rule' => array('notempty'),

				//'message' => array('Please Enter your state.'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		),
		'country' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter your country',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'isOfficial' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'add to the official list ?',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'users_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		

		
		'phone' => array(
					'numeric' => array(
						'required' => false,
						'rule' => array('numeric'),
						'message'=>'Not valid phone, phone can only contain numbers from 0-9 and "+"'
						//'message' => 'Your custom message here',
						//'allowEmpty' => false,
						//'required' => false,
						//'last' => false, // Stop validation after this rule
						//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
				),
				
		
		
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Users' => array(
			'className' => 'Users',
			'foreignKey' => 'users_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>