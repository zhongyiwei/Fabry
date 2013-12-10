<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    /* public function view($id = null) {
      if (!$this->User->exists($id)) {
      throw new NotFoundException(__('Invalid user'));
      }
      $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
      $this->set('user', $this->User->find('first', $options));
      } *///baked
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            $content = array('User' =>
                array('id' => $id));
            $this->set('user', $content);
        } else {

            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->set('user', $this->User->find('first', $options));
        }
    }

    /**
     * add method
     *
     * @return void
     */
    /* public function add() {
      if ($this->request->is('post')) {
      $this->User->create();
      if ($this->User->save($this->request->data)) {
      $this->Session->setFlash(__('The user has been saved.'));
      return $this->redirect(array('action' => 'index'));
      } else {
      $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
      }
      }
      } *///baked
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The profile has been saved.'), 'default', array(), 'good');
                return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
            } else {
                $this->Session->setFlash(__('We could not add your profile. Please, try again.'), 'default', array(), 'bad');
            }
        }
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'forgotpassword');
    }

    public function isAuthorized($user) {

        if ($user['role'] == 'admin' || $user['role'] == 'super') {
            return true;
        }

        if (in_array($this->action, array('edit', 'delete'))) {    // check and make sure the id a login user is not different from they id they trying to edit.
            if ($user['id'] != $this->request->params['pass'][0]) {
                return false;
            }
        }
        return true;
    }

    public function login() {
        if ($this->request->is('post')) {          // check the request type, if it is post, means they are trying to login.
            if ($this->Auth->login()) {          // if the login is successful, we just redirect the user to the index page(because location we set in AppController is index ) 	
                $this->redirect($this->Auth->redirect(array('controller' => 'pages', 'action' => 'display', 'home')));
            } else {
                $this->Session->setFlash(__('Your username/password combination was incorrect'), 'default', array(), 'bad');    //if the login failed, we just give this message to user.  
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());           // Logout the user and destroy the session. Then redirect the user to the index page(because location we set in AppController is index )
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    /* public function edit($id = null) {
      if (!$this->User->exists($id)) {
      throw new NotFoundException(__('Invalid user'));
      }
      if ($this->request->is(array('post', 'put'))) {
      if ($this->User->save($this->request->data)) {
      $this->Session->setFlash(__('The user has been saved.'));
      return $this->redirect(array('action' => 'index'));
      } else {
      $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
      }
      } else {
      $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
      $this->request->data = $this->User->find('first', $options);
      }
      } *///baked
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The profile has been edited successfully.'), 'default', array(), 'good');
                /* $userId = $current_user['id']; */
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('We cannot apply these changes. Please, try again.'), 'default', array(), 'bad');
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            // The password field must be empty, so it is important to clear the password content
            $content = $this->User->find('first', $options); // fetch the user content manually
            $content['User']['password'] = ''; // clear the password
            $this->request->data = $content; // fetch the fields by the modified content
        }
    }

    public function password($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Your password has been saved.'), 'default', array(), 'good');
                return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
            } else {
                $this->Session->setFlash(__('We could not update your password. Please, try again.'), 'default', array(), 'bad');
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            // The password field must be empty, so it is important to clear the password content
            $content = $this->User->find('first', $options); // fetch the user content manually
            $content['User']['password'] = ''; // clear the password
            $this->request->data = $content; // fetch the fields by the modified content
        }
    }

    public function forgotpassword() {
        App::uses('CakeEmail', 'Network/Email');
        if ($this->request->is('post')) {
            $user_email = $this->request->data['User']['forget'];

            $user = $this->User->find('all', array('conditions' => array('User.email' => $user_email)));

            if (count($user) != 0) {
                $tempPassword = $this->User->createTempPassword(8);

                $data = array('id' => $user[0]['User']['id'], 'password' => $tempPassword);

                if ($this->User->save($data)) {
                    $email = new CakeEmail();
                    $email->config('default');
                    $email->emailFormat('html');
                    $email->from("team61fabry@gmail.com");
                    $email->to($user_email);

                    $userName = $user[0]['User']['firstName'] . " " . $user[0]['User']['lastName'];
                    ;
                    $email->subject("Your New Password from FSGA");
                    $body = "
	                <div style='font-family:Century Gothic; color:#06496e; width:620px;'><p>Dear $userName</p>
	                <p>Your new fabry system password is </p>
	                <p style='font-weight:bold'>$tempPassword</p>
	                <p>Please go to profile update to change your password once you login</p>
                                 
                                    <p style='margin-top:30px;'>Kind regards, </p>
                                    <p>Fabry Support Group Australia</p>
	                </div>
	                ";
                    $email->send($body);
                    $this->Session->setFlash(__('An email consisting the temporary password has been forwarded to your email'), 'default', array(), 'good');
                    $this->redirect(array('controller' => 'users', 'action' => "index"));
                }
            } else {
                $this->Session->setFlash(__('You must have a valid e-mail for this action'), 'default', array(), 'bad');
            }
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The profile has been deleted.'), 'default', array(), 'good');
        } else {
            $this->Session->setFlash(__('The profile could not be deleted. Please, try again.'), 'default', array(), 'bad');
        }
        return $this->redirect(array('action' => 'index'));
    }

    //this function to redirect the user to the right page 
    public function display() {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('users');
        }
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $this->set(compact('users', 'subpage', 'title_for_layout'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

}
