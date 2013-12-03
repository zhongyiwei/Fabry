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
        $this->Contact->recursive = 0;
        $this->set('contacts', $this->Paginator->paginate());
    }

    public function memindex() {
        $this->Contact->recursive = 0;
        $this->set('contacts', $this->Paginator->paginate());
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
        if ($this->request->is(array('post', 'put'))) {

//            $data_save = array('users_id' => $id);    // get current user's id
//            $data_save = array('Contact' => array_merge($this->request->data['Contact'], $data_save));
            //debug($data_save);
            //die;
//            $this->request->data['Appointment']['users_id'] = $this->current_user['id'];

            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash(__('The contact has been saved.'), 'default', array(), 'good');
                return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
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
        if ($this->request->is('post')) {
//            $this->request->data['Appointment']['users_id'] = $this->current_user['id'];
//            $this->Contact->create();
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash(__('The contact has been saved.'), 'default', array(), 'good');
                return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
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
        if (!$this->Contact->exists($id)) {
            throw new NotFoundException(__('Invalid contact'));
        }

        if ($this->request->is(array('post', 'put'))) {
//            $this->request->data['Appointment']['users_id'] = $this->current_user['id'];
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash(__('The contact has been saved.'), 'default', array(), 'good');
                return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
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
        if (!$this->Contact->exists()) {
            throw new NotFoundException(__('Invalid contact'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Contact->delete()) {
            $this->Session->setFlash(__('The contact has been deleted.'), 'default', array(), 'good');
        } else {
            $this->Session->setFlash(__('The contact could not be deleted. Please, try again.'), 'default', array(), 'bad');
        }
        return $this->redirect(array('action' => 'index'));
    }

}
