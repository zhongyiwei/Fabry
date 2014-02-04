<?php

App::uses('AppController', 'Controller');

/**
 * Contacts Controller
 *
 * @property Contact $Contact
 * @property PaginatorComponent $Paginator
 */
class ContactsController extends AppController {

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
        $id = $this->current_user['id'];
        $contacts = $this->Contact->find('all', array('conditions' => array('isOfficial' => 1)));
//        debug($contacts);
        $this->set(compact('contacts'));
    }

    public function memindex() {
//        $this->Contact->recursive = 0;
//        $this->set('contacts', $this->Paginator->paginate());
        $id = $this->current_user['id'];
        $contacts = $this->Contact->find('all', array('conditions' => array('AND' => array(array('Contact.users_id' => $id), array('isOfficial' => 0)))));
//        debug($contacts);
        $this->set(compact('contacts'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Contact->exists($id)) {
            throw new NotFoundException(__('Invalid contact'));
        }
        $options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
        $this->set('contact', $this->Contact->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($id = null) {
        $role = $this->current_user['role'];
        if ($this->request->is(array('post', 'put'))) {

//            $data_save = array('users_id' => $id);    // get current user's id
//            $data_save = array('Contact' => array_merge($this->request->data['Contact'], $data_save));
            //debug($data_save);
            //die;
            $this->request->data['Contact']['users_id'] = $this->current_user['id'];

            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash(__('The contact has been saved.'), 'default', array(), 'good');
                $redirect = $this->params['url']['redirect'];
                if ($redirect == "event") {
                    return $this->redirect(array('action' => 'add', 'controller' => 'appointments'));
                } else {
                    if ($role == 'admin')
                        return $this->redirect(array('action' => 'index'));
                    else
                        return $this->redirect(array('action' => 'memindex'));
                }
            } else {
                $this->Session->setFlash(__('The contact could not be saved. Please, try again.'), 'default', array(), 'bad');
            }
        }

        //$users = $this->Contact->User->find('list');
        $this->set(compact('users'));
    }

    /* $this->Contact->create();$this->request->data['users_id']=$current_user_id;
      $data_to_save = $this->request->data;
      debug($data_to_save);
      die; */

    /**
     * admadd method
     *
     * @return void
     */
    public function admadd() {
        $role = $this->current_user['role'];
        if ($this->request->is('post')) {
            $this->request->data['Contact']['users_id'] = $this->current_user['id'];
            $this->Contact->create();
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash(__('The contact has been saved.'), 'default', array(), 'good');
                if ($role == 'admin')
                    return $this->redirect(array('action' => 'index'));
                else
                    return $this->redirect(array('action' => 'memindex'));
            } else {
                $this->Session->setFlash(__('The contact could not be saved. Please, try again.'), 'default', array(), 'bad');
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $role = $this->current_user['role'];
        if (!$this->Contact->exists($id)) {
            throw new NotFoundException(__('Invalid contact'));
        }

        if ($this->request->is(array('post', 'put'))) {
//            $this->request->data['Appointment']['users_id'] = $this->current_user['id'];
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash(__('The contact has been saved.'), 'default', array(), 'good');
//                return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
                if ($role == 'admin')
                    return $this->redirect(array('action' => 'index'));
                else
                    return $this->redirect(array('action' => 'memindex'));
            } else {
                $this->Session->setFlash(__('The contact could not be saved. Please, try again.'), 'default', array(), 'bad');
            }
        } else {
            $options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
            $this->request->data = $this->Contact->find('first', $options);
        }
        $this->set(compact('users'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Contact->id = $id;
        $role = $this->current_user['role'];
        
        $uId = $this->current_user['id'];
        if (!$this->Contact->exists()) {
            throw new NotFoundException(__('Invalid contact'));
        }
        $this->request->onlyAllow('post', 'delete');
        
        $appointment = $this->Appointment->find("all", array("conditions"=>array("contacts_id"=>$id,'Appointment.users_id'=>$uId),"fields"=>array('id')));

        foreach ($appointment as $app){
            $appId[] = $app['Appointment']['id'];
        }
//        debug($appId);
        
        if ($this->Contact->delete()) {
            $this->Appointment->deleteAll(array('Appointment.id'=>$appId));
            $this->Session->setFlash(__('The contact has been deleted.'), 'default', array(), 'good');
        } else {
            $this->Session->setFlash(__('The contact could not be deleted. Please, try again.'), 'default', array(), 'bad');
        }
        if ($role == 'admin')
            return $this->redirect(array('action' => 'index'));
        else
            return $this->redirect(array('action' => 'memindex'));
    }

}
