<?php

App::uses('AppController', 'Controller');

/**
 * Bowels Controller
 *
 * @property Bowel $Bowel
 * @property PaginatorComponent $Paginator
 */
class BowelsController extends AppController {

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
        $bowel = $this->Bowel->find('all', array('conditions' => array('users_id' => $id)));
        $this->set('bowels', $bowel);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Bowel->exists($id)) {
            throw new NotFoundException(__('Invalid record'));
        }
        $options = array('conditions' => array('Bowel.' . $this->Bowel->primaryKey => $id));
        $this->set('bowel', $this->Bowel->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $id = $this->current_user['id'];
            $this->request->data['Bowel']['users_id'] = $id;

            $date = $this->request->data['Bowel']['date'];
            $date = date('Y-m-d', strtotime($date));

            $bo = $this->Bowel->find('all', array('conditions' => array('users_id' => $id, 'date' => $date)));

            if (empty($bo)) {
                $this->request->data['Bowel']['date'] = date('Y-m-d', strtotime($date));

                $this->Bowel->create();
                if ($this->Bowel->save($this->request->data)) {
                    $this->Session->setFlash(__('The record has been saved.'), 'default', array(), 'good');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'default', array(), 'bad');
                }
            } else {
                $this->Session->setFlash(__('There can be only one event occurred in one day.'), 'default', array(), 'bad');
            }
        }
        //$users = $this->Bowel->User->find('list');
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
        if (!$this->Bowel->exists($id)) {
            throw new NotFoundException(__('Invalid record'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $date = $this->request->data['Bowel']['date'];
            $this->request->data['Bowel']['date'] = date('Y-m-d', strtotime($date));
            if ($this->Bowel->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved.'), 'default', array(), 'good');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'default', array(), 'bad');
            }
        } else {
            $options = array('conditions' => array('Bowel.' . $this->Bowel->primaryKey => $id));
            $this->request->data = $this->Bowel->find('first', $options);
        }
        //$users = $this->Bowel->User->find('list');
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
        $this->Bowel->id = $id;
        if (!$this->Bowel->exists()) {
            throw new NotFoundException(__('Invalid bowel'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Bowel->delete()) {
            $this->Session->setFlash(__('The record has been deleted.'), 'default', array(), 'good');
        } else {
            $this->Session->setFlash(__('The record could not be deleted. Please, try again.'), 'default', array(), 'bad');
        }
        return $this->redirect(array('action' => 'index'));
    }

}
