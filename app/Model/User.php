<?php
App::uses('AppModel', 'Model');
/**
 * User Model is set for all validations
 *
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */


	public $validate = array(
		'username' => array(
        			'rule' => 'isUnique',
        				'required' => 'create',
                        	'allowEmpty'=>false,
                            'message'=>'This user name has already been used.'
							//'message' => 'Your custom message here',
							//'allowEmpty' => false,
							//'required' => false,
							//'last' => false, // Stop validation after this rule
							//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
                /*'current_password' => array(
                    'required' => array(
                        'rule' => array('notEmpty'),
                        'message' => 'A password is required'
                    ),
                    'rule'    => array('matchcurpass'),
                    'message' => 'Your current password is incorrect'
                ),*/
		
                'password1' => array(
                    'required' => array(
                        'rule' => array('notEmpty'),
                        'message' => 'A password is required'
                    ),
                    'rule'    => array('passwordsMatching'),
                    'message' => 'Your two passwords do not match'
                ),
                'password' => array(
                    'required' => array(
                        'rule' => array('notEmpty'),
                        'message' => 'A password is required'
                    ),
                    'rule' => array('minLength', 4),
                    'message' => 'password must be at least 4 characters long'
                ),
                
                'firstName' => array(
					'notempty' => array(
					'rule' => array('notempty'),
                        'message'=>'Please enter your first name'
						//'message' => 'Your custom message here',
						//'allowEmpty' => false,
						//'required' => false,
						//'last' => false, // Stop validation after this rule
						//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
				),
                
				'lastName' => array(
					'notempty' => array(
					'rule' => array('notempty'),
                        'message'=>'Please Enter Your Last Name'
						//'message' => 'Your custom message here',
						//'allowEmpty' => false,
						//'required' => false,
						//'last' => false, // Stop validation after this rule
						//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
				),
				'email' => array(
					//'email' => array(
						//'rule' => array('email'),
						//'message' =>'Please Enter Valid Email Address'
						//'message' => 'Your custom message here',
						//'allowEmpty' => false,
						//'required' => false,
						//'last' => false, // Stop validation after this rule
						//'on' => 'create', // Limit validation to 'create' or 'update' operations
					//),
				),
                'phone' => array(
					'numeric' => array(
						'rule' => array('numeric'),
						'message'=>'phone only contain numbers from 0-9 and "+"'
						//'message' => 'Your custom message here',
						//'allowEmpty' => false,
						//'required' => false,
						//'last' => false, // Stop validation after this rule
						//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
				),
                'treatment' => array(
					'notempty' => array(
						'rule' => array('notempty'),
							'message'=>'Please select your answer.'
							//'message' => 'Your custom message here',
							//'allowEmpty' => false,
							//'required' => false,
							//'last' => false, // Stop validation after this rule
							//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
				),
                'membershipType' => array(
					'notempty' => array(
						'rule' => array('notempty'),
						'message'=>'Please select your membership type.'
						//'message' => 'Your custom message here',
						//'allowEmpty' => false,
						//'required' => false,
						//'last' => false, // Stop validation after this rule
						//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
				),
				'fabryStatus' => array(
					'notempty' => array(
						'rule' => array('notempty'),
						'message'=>'Please select your fabry status.'
						//'message' => 'Your custom message here',
						//'allowEmpty' => false,
						//'required' => false,
						//'last' => false, // Stop validation after this rule
						//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
				),
				'address' => array(
					'notempty' => array(
						'rule' => array('notempty'),
                        'message'=>'Please enter Street Name/ Number.'
						//'message' => 'Your custom message here',
						//'allowEmpty' => false,
						//'required' => false,
						//'last' => false, // Stop validation after this rule
						//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
				),
				'suburb' => array(
					'notempty' => array(
						'rule' => array('notempty'),
                    	'message'=>'Please enter your suburb.'
						//'message' => 'Your custom message here',
						//'allowEmpty' => false,
						//'required' => false,
						//'last' => false, // Stop validation after this rule
						//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
				),
				'state' => array(
					/*'notempty' => array(
					'rule' => array('notempty'),
						'message'=>'You cannot continue with this field empty, Please enter your state.'*/
						//'message' => 'Your custom message here',
						//'allowEmpty' => false,
						//'required' => false,
						//'last' => false, // Stop validation after this rule
						//'on' => 'create', // Limit validation to 'create' or 'update' operations
					
				),
				'country' => array(
					'notempty' => array(
						'rule' => array('notempty'),
							'message'=>'Please enter your country.'
							//'message' => 'Your custom message here',
							//'allowEmpty' => false,
							//'required' => false,
							//'last' => false, // Stop validation after this rule
							//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
				),
	);
        
        function passwordsMatching($data) {
        $valid = false;
        if ($this->data['User']['password'] == $this->data['User']['password1']) {
            $valid = true;
        }
        return $valid;
    }

    function matchcurpass($data) {
        $valid = false;
        if (Security::hash(Configure::read('Security.salt').$this->data['User']['current_password']) == $this->data['User']['password']) {
            $valid = true;
        }
        return $valid;
    }

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
		if (!empty($this->data['user']['dob'])) { 
				$this->data['user']['dob'] = $this->dateFormat($this->data['user']['dob']); 
		} 
		return true; 

    }

    public function ChangeBeforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password1'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password1']);
        }
        return true;
    }

    function createTempPassword($len) {
        $pass = '';
        $lchar = 0;
        $char = 0;
        for($i = 0; $i < $len; $i++) {
            while($char == $lchar) {
                $char = rand(48, 109);
                if($char > 57) $char += 7;
                if($char > 90) $char += 6;
            }
            $pass .= chr($char);
            $lchar = $char;
        }
        return $pass;
    }
	function afterFind($results, $primary=false) { 
		foreach ($results as $key => $val) { 
			if (isset($val['Horse']['dob'])) { 
	$results[$key]['user']['dob'] = $this->dateFormatAfterFind($val['user']['dob']); 
			} 
		} 
		return $results; 
	} 
	function dateFormatAfterFind($dateString) { 
			return date('d/m/Y', strtotime($dateString)); 
	} 
	function dateFormatBeforeSave($dateString) { 
		$newDate = explode("-",$dateString); 
		return $newDate[2]."-".$newDate[1]."-".$newDate[0]; 
	} 



}
?>
