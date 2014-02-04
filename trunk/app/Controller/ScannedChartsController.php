<?php
App::uses('AppController', 'Controller');
/**
 * ScannedCharts Controller
 *
 * @property ScannedChart $ScannedChart
 * @property PaginatorComponent $Paginator
 */
class ScannedChartsController extends AppController {

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
		$this->ScannedChart->recursive = 0;
		$this->set('scannedCharts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ScannedChart->exists($id)) {
			throw new NotFoundException(__('Invalid scanned chart'));
		}
		$options = array('conditions' => array('ScannedChart.' . $this->ScannedChart->primaryKey => $id));
		$this->set('scannedChart', $this->ScannedChart->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ScannedChart->create();
			if ($this->ScannedChart->save($this->request->data)) {
				$this->Session->setFlash(__('The scanned chart has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The scanned chart could not be saved. Please, try again.'));
			}
		}
		$users = $this->ScannedChart->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ScannedChart->exists($id)) {
			throw new NotFoundException(__('Invalid scanned chart'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ScannedChart->save($this->request->data)) {
				$this->Session->setFlash(__('The scanned chart has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The scanned chart could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ScannedChart.' . $this->ScannedChart->primaryKey => $id));
			$this->request->data = $this->ScannedChart->find('first', $options);
		}
		$users = $this->ScannedChart->User->find('list');
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
		$this->ScannedChart->id = $id;
		if (!$this->ScannedChart->exists()) {
			throw new NotFoundException(__('Invalid scanned chart'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ScannedChart->delete()) {
			$this->Session->setFlash(__('The scanned chart has been deleted.'));
		} else {
			$this->Session->setFlash(__('The scanned chart could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
