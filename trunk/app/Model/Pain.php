<?php
App::uses('AppModel', 'Model');
/**
 * Pain Model
 *
 * @property Users $Users
 */
class Pain extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'date';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'date' => array(
					    'rule' => 'isUnique',
				'message' => 'You cannot have more than an entry per day',
			'date' => array(

				'rule' => array('date'),
				'message' => 'Please select a date',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'painLevel' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please select a number',),
                                array(
                                      'rule' => array('inList', array('0','1','2','3','4','5','6','7','8','9','10')),                                
                                        'message' => 'Pain level has to be between number of 0 - 10'
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
