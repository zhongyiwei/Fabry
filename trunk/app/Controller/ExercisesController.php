<?php

App::uses('AppController', 'Controller');

/**
 * Exercises Controller
 *
 * @property Exercise $Exercise
 * @property PaginatorComponent $Paginator
 */
class ExercisesController extends AppController {

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
        $exercise = $this->Exercise->find('all', array('conditions' => array('users_id' => $id)));
        $this->set('exercises', $exercise);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Exercise->exists($id)) {
            throw new NotFoundException(__('Invalid exercise'));
        }
        $options = array('conditions' => array('Exercise.' . $this->Exercise->primaryKey => $id));
        $this->set('exercise', $this->Exercise->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {

            $id = $this->current_user['id'];
            $this->request->data['Exercise']['users_id'] = $id;

            $date = $this->request->data['Exercise']['date'];
            $date = date('Y-m-d', strtotime($date));

            $exe = $this->Exercise->find('all', array('conditions' => array('users_id' => $id, 'date' => $date)));

            if (empty($exe)) {
                $this->request->data['Exercise']['date'] = date('Y-m-d', strtotime($date));
                $this->Exercise->create();
                if ($this->Exercise->save($this->request->data)) {
                    $this->Session->setFlash(__('The exercise has been saved.'), 'default', array(), 'good');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The exercise could not be saved. Please, try again.'), 'default', array(), 'bad');
                }
            } else {
                $this->Session->setFlash(__('There can be only one event occurred in one day.'), 'default', array(), 'bad');
            }
            //$users = $this->Exercise->User->find('list');
            //$this->set(compact('users'));
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
        if (!$this->Exercise->exists($id)) {
            throw new NotFoundException(__('Invalid exercise'), 'default', array(), 'bad');
        }
        if ($this->request->is(array('post', 'put'))) {
            $date = $this->request->data['Exercise']['date'];
            $this->request->data['Exercise']['date'] = date('Y-m-d', strtotime($date));
//            $date = date('Y-m-d', strtotime($date));

            if ($this->Exercise->save($this->request->data)) {
                $this->Session->setFlash(__('The exercise has been saved.'), 'default', array(), 'good');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The exercise could not be saved. Please, try again.'), 'default', array(), 'bad');
            }
        } else {
            $options = array('conditions' => array('Exercise.' . $this->Exercise->primaryKey => $id));
            $this->request->data = $this->Exercise->find('first', $options);
        }
        //$users = $this->Exercise->User->find('list');
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
        $this->Exercise->id = $id;
        if (!$this->Exercise->exists()) {
            throw new NotFoundException(__('Invalid exercise'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Exercise->delete()) {
            $this->Session->setFlash(__('The exercise entry has been deleted.'), 'default', array(), 'good');
        } else {
            $this->Session->setFlash(__('The exercise entry could not be deleted. Please, try again.'), 'default', array(), 'bad');
        }
        return $this->redirect(array('action' => 'index'));
    }

}
