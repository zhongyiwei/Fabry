<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');
App::uses('FormHelper', 'View/Helper');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

//public $components = array('DebugKit.Toolbar');
//var $components = array('Auth','Session');
var $helpers = array('Form2'); 

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'), //this show the location the user should be redirected to whenever they login and logout.
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
            'authError' => "You can't access that page", //whenever the user login, and they try to access the page they are not authorized to access, they will receive this error message.
            'authorize' => array('Controller')
        )
    );
    var $uses = array('CalendarEvent', 'Appointment', 'Contact', 'User','Invitation','Pain','Bowel','Exercise','Medication');

    public function isAuthorized($user) {                                                      // to determine if a user who is login has permission to access the page they trying to access.
        return true;
    }

    public function beforeFilter() {               // to determine which page can be access by non-login users.
        $this->Auth->allow('login','invitations');               /* Force all users to login if they do not login */
        $this->set('logged_in', $this->Auth->loggedIn());          // return true or false when login.
        $this->set('current_user', $this->Auth->user());          // to hold the information of current login user. Send the entire user to view.
        $this->current_user = $this->Auth->user();

        $this->sender = "admin@fabry.com.au";
        $this->senderTag = "Fabry Admin";
        
        $this->Auth->allow('attendStatus');
    }

}