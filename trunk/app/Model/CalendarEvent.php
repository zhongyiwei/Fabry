<?php

App::uses('AppModel', 'Model');

/**
 * CalendarEvent Model
 *
 * @property Users $Users
 */
class CalendarEvent extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'title' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'please enter the event title.',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'start' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'please select the start time of the event',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'end' => array(
//			'notempty' => array(
//				'rule' => array('notempty'),
//				'message' => 'please select the end time of the event',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
        ),
        // 'allDay' => array(
//             'notempty' => array(
//                 'rule' => array('notempty'),
//             //'message' => 'Your custom message here',
//             //'allowEmpty' => false,
//             //'required' => false,
//             //'last' => false, // Stop validation after this rule
//             //'on' => 'create', // Limit validation to 'create' or 'update' operations
//             ),
//         ),
        'repeatTimes' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Please select a number',
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ), 'frequency' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
//		'users_id' => array(
//			'numeric' => array(
//				'rule' => array('numeric'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
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
