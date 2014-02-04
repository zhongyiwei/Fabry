<?php

App::uses('AppController', 'Controller');

/**
 * Painmedis Controller
 *
 * @property Painmedi $Painmedi
 * @property PaginatorComponent $Paginator
 */
class PainmedisController extends AppController {

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
        $pains = $this->Painmedi->find('all', array('conditions' => array('painmedi.users_id' => $id)));
        $this->set('painmedis', $pains);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Painmedi->exists($id)) {
            throw new NotFoundException(__('Invalid painmedi'));
        }
        $options = array('conditions' => array('Painmedi.' . $this->Painmedi->primaryKey => $id));
        $this->set('painmedi', $this->Painmedi->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Painmedi->create();
            if ($this->Painmedi->save($this->request->data)) {
                $this->Session->setFlash(__('The painmedi has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The painmedi could not be saved. Please, try again.'));
            }
        }
        $pains = $this->Painmedi->Pain->find('list');
        $users = $this->Painmedi->User->find('list');
        $medications = $this->Painmedi->Medication->find('list');
        $this->set(compact('pains', 'users', 'medications'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Painmedi->exists($id)) {
            throw new NotFoundException(__('Invalid painmedi'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Painmedi->save($this->request->data)) {
                $this->Session->setFlash(__('The painmedi has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The painmedi could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Painmedi.' . $this->Painmedi->primaryKey => $id));
            $this->request->data = $this->Painmedi->find('first', $options);
        }
        $pains = $this->Painmedi->Pain->find('list');
        $users = $this->Painmedi->User->find('list');
        $medications = $this->Painmedi->Medication->find('list');
        $this->set(compact('pains', 'users', 'medications'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Painmedi->id = $id;
        if (!$this->Painmedi->exists()) {
            throw new NotFoundException(__('Invalid painmedi'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Painmedi->delete()) {
            $this->Session->setFlash(__('The painmedi has been deleted.'));
        } else {
            $this->Session->setFlash(__('The painmedi could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
