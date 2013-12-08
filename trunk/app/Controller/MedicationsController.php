<?php

App::uses('AppController', 'Controller');

/**
 * Medications Controller
 *
 * @property Medication $Medication
 * @property PaginatorComponent $Paginator
 */
class MedicationsController extends AppController {

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
        $medi = $this->Medication->find('all', array('conditions' => array('users_id' => $id)));
        $this->set('medications', $medi);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Medication->exists($id)) {
            throw new NotFoundException(__('Invalid medication'));
        }
        $options = array('conditions' => array('Medication.' . $this->Medication->primaryKey => $id));
        $this->set('medication', $this->Medication->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $id = $this->current_user['id'];
            $this->request->data['Medication']['users_id'] = $id;
            $this->Medication->create();
            if ($this->Medication->save($this->request->data)) {
                $this->Session->setFlash(__('The medication has been saved.'), 'default', array(), 'good');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The medication could not be saved. Please, try again.'), 'default', array(), 'bad');
            }
        }
        //$users = $this->Medication->User->find('list');
        //$this->set(compact('users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Medication->exists($id)) {
            throw new NotFoundException(__('Invalid medication'));
        }
        if ($this->request->is(array('post', 'put'))) {

            $uid = $this->current_user['id'];
            $this->request->data['Medication']['users_id'] = $uid;
            $this->request->data['Medication']['id'] = $id;
            if ($this->Medication->save($this->request->data)) {
                $this->Session->setFlash(__('The medication has been saved.'), 'default', array(), 'good');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The medication could not be saved. Please, try again.'), 'default', array(), 'bad');
            }
        } else {
            $options = array('conditions' => array('Medication.' . $this->Medication->primaryKey => $id));
            $this->request->data = $this->Medication->find('first', $options);
        }
        //$users = $this->Medication->User->find('list');
        //$this->set(compact('users'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Medication->id = $id;
        if (!$this->Medication->exists()) {
            throw new NotFoundException(__('Invalid medication'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Medication->delete()) {
            $this->Session->setFlash(__('The medication has been deleted.'), 'default', array(), 'good');
        } else {
            $this->Session->setFlash(__('The medication could not be deleted. Please, try again.'), 'default', array(), 'bad');
        }
        return $this->redirect(array('action' => 'index'));
    }

}
