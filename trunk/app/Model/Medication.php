<?php

App::uses('AppModel', 'Model');

/**
 * Medication Model
 *
 * @property Users $Users
 */
class Medication extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'medicationName' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            'message' => 'Please enter name of medication',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'strengthEachPill' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            'message' => 'Please enter strength of each medication',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'doseEachTime' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            'message' => 'Please enter dosage to take each time',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'frequency' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
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
        'repeatTimes' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            'message' => 'Please select a number',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'start' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            'message' => 'Please select a date',
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
