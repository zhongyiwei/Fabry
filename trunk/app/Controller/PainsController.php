<?php

App::uses('AppController', 'Controller');

/**
 * Pains Controller
 *
 * @property Pain $Pain
 * @property PaginatorComponent $Paginator
 */
class PainsController extends AppController {

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
//        $this->Pain->recursive = 0;
        $id = $this->current_user['id'];
        $pains = $this->Pain->find('all', array('conditions' => array('users_id' => $id)));
        $this->set('pains', $pains);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Pain->exists($id)) {
            throw new NotFoundException(__('Invalid pain'));
        }
        $options = array('conditions' => array('Pain.' . $this->Pain->primaryKey => $id));
        $this->set('pain', $this->Pain->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $id = $this->current_user['id'];
            $this->request->data['Pain']['users_id'] = $id;
            $this->Pain->create();
            if ($this->Pain->save($this->request->data)) {
                $this->Session->setFlash(__('The pain has been saved.'), 'default', array(), 'good');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The pain could not be saved. Please, try again.'), 'default', array(), 'bad');
            }
        }
        //$users = $this->Pain->User->find('list');
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
        if (!$this->Pain->exists($id)) {
            throw new NotFoundException(__('Invalid pain'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Pain->save($this->request->data)) {
                $this->Session->setFlash(__('The pain has been saved.'), 'default', array(), 'good');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The pain could not be saved. Please, try again.'), 'default', array(), 'bad');
            }
        } else {
            $options = array('conditions' => array('Pain.' . $this->Pain->primaryKey => $id));
            $this->request->data = $this->Pain->find('first', $options);
        }
        //$users = $this->Pain->User->find('list');
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
        $this->Pain->id = $id;
        if (!$this->Pain->exists()) {
            throw new NotFoundException(__('Invalid pain'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Pain->delete()) {
            $this->Session->setFlash(__('The pain has been deleted.'), 'default', array(), 'good');
        } else {
            $this->Session->setFlash(__('The pain could not be deleted. Please, try again.'), 'default', array(), 'bad');
        }
        return $this->redirect(array('action' => 'index'));
    }

}