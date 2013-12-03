<?php

App::uses('AppModel', 'Model');

class Appointment extends AppModel {

    public $validate = array(
        'contacts_id' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'could not be saved. please select your doctor'
    )));
// appointment $belongsto contact because appointment can be assosiated with many contacts

    public $belongsTo = array(
        'Contact' => array(
            'className' => 'Contact',
            'foreignKey' => 'contacts_id',
        )
    );

}

?>