<?php
App::uses('AppController', 'Controller');
/**
 * Eventsusers Controller
 *
 * @property Eventsuser $Eventsuser
 * @property PaginatorComponent $Paginator
 */
class EventsusersController extends AppController {

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
		$this->Eventsuser->recursive = 0;
		$this->set('eventsusers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Eventsuser->exists($id)) {
			throw new NotFoundException(__('Invalid eventsuser'));
		}
		$options = array('conditions' => array('Eventsuser.' . $this->Eventsuser->primaryKey => $id));
		$this->set('eventsuser', $this->Eventsuser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Eventsuser->create();
			if ($this->Eventsuser->save($this->request->data)) {
				$this->Session->setFlash(__('The eventsuser has been saved.'), 'default',array(),'good');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The eventsuser could not be saved. Please, try again.'), 'default',array(),'bad');
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
		if (!$this->Eventsuser->exists($id)) {
			throw new NotFoundException(__('Invalid eventsuser'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Eventsuser->save($this->request->data)) {
				$this->Session->setFlash(__('The eventsuser has been saved.'), 'default',array(),'good');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The eventsuser could not be saved. Please, try again.'), 'default',array(),'bad');
			}
		} else {
			$options = array('conditions' => array('Eventsuser.' . $this->Eventsuser->primaryKey => $id));
			$this->request->data = $this->Eventsuser->find('first', $options);
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
		$this->Eventsuser->id = $id;
		if (!$this->Eventsuser->exists()) {
			throw new NotFoundException(__('Invalid eventsuser'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Eventsuser->delete()) {
			$this->Session->setFlash(__('The eventsuser has been deleted.'), 'default',array(),'good');
		} else {
			$this->Session->setFlash(__('The eventsuser could not be deleted. Please, try again.'), 'default',array(),'bad');
		}
		return $this->redirect(array('action' => 'index'));
	}}
