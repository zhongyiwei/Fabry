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
        $uid = $this->current_user['id'];
        $medicationName = $this->Medication->find("list", array('fields' => array('id', 'medicationName'), 'conditions' => array('medication.users_id' => $uid)));

        if ($this->request->is('post')) {
            $id = $this->current_user['id'];
            $this->request->data['Pain']['users_id'] = $id;

            $date = $this->request->data['Pain']['date'];
            $this->request->data['Pain']['date'] = date('Y-m-d', strtotime($date));
//            $date = date('Y-m-d 00:00:00', strtotime($date));
//            debug($date);
            $paind = $this->Pain->find('all', array('conditions' => array('users_id' => $id, 'date' => $date)));
//            debug($paind);

            $selectedMedi = $this->request->data['Pain']['medications'];
            if (empty($paind) && !empty($selectedMedi)) {
                $this->Pain->create();

                if ($this->Pain->save($this->request->data)) {
                    $painData = $this->Pain->find('all', array('order' => 'pain.id DESC', 'limit' => 1));
                    $painId = $painData[0]['Pain']['id'];

                    for ($i = 0; $i < count($selectedMedi); $i++) {
                        $data[$i] = array('id' => '', 'users_id' => $id, 'pains_id' => $painId, 'medications_id' => $selectedMedi[$i], 'medi_select_status' => 'Y');
                    }

                    $this->PainMedi->saveMany($data);

                    $this->Session->setFlash(__('The pain has been saved.'), 'default', array(), 'good');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The pain data could not be saved. Please, try again.'), 'default', array(), 'bad');
                }
            } else {
                $this->Session->setFlash(__('Please ensure you have chosen at least one medicine and you does not have the same day record.'), 'default', array(), 'bad');
            }
        }
        $this->set(compact("medicationName"));
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

        $medicationName = $this->Medication->find("list", array('fields' => array('id', 'medicationName')));

        if ($this->request->is(array('post', 'put'))) {
            if ($this->Pain->save($this->request->data)) {


//                $uid = $this->current_user['id'];
//                $selectedMedi = $this->request->data['Pain']['medications'];
//
//
//                for ($i = 0; $i < count($selectedMedi); $i++) {
//                    $painMediData = $this->PainMedi->find('all', array('conditions' => array('users_id' => $uid, 'pains_id' => $id, 'medications_id' => $selectedMedi[$i])));
//                    $data[$i] = array('id' => $painMediData[0]['PainMedi']['id'], 'users_id' => $uid, 'pains_id' => $id, 'medications_id' => $selectedMedi[$i], 'medi_select_status' => 'N');
//                }
//
//                $this->PainMedi->saveMany($data);

                $this->Session->setFlash(__('The pain has been saved.'), 'default', array(), 'good');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The pain data could not be saved. Please, try again.'), 'default', array(), 'bad');
            }
        } else {
            $options = array('conditions' => array('Pain.' . $this->Pain->primaryKey => $id));
            $this->request->data = $this->Pain->find('first', $options);
        }
        $this->set(compact("medicationName"));
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
