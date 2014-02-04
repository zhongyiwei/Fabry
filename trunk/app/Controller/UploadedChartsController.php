<?php
App::uses('AppController', 'Controller');
/**
 * UploadedCharts Controller
 *
 * @property UploadedChart $UploadedChart
 * @property PaginatorComponent $Paginator
 */
class UploadedChartsController extends AppController {

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
		$this->UploadedChart->recursive = 0;
		$this->set('uploadedCharts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UploadedChart->exists($id)) {
			throw new NotFoundException(__('Invalid uploaded chart'));
		}
		$options = array('conditions' => array('UploadedChart.' . $this->UploadedChart->primaryKey => $id));
		$this->set('uploadedChart', $this->UploadedChart->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UploadedChart->create();
			
			if ($this->UploadedChart->save($this->request->data)) {
				$this->Session->setFlash(__('The uploaded chart has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The uploaded chart could not be saved. Please, try again.'));
			}
		}
		$users = $this->UploadedChart->User->find('list');
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
		if (!$this->UploadedChart->exists($id)) {
			throw new NotFoundException(__('Invalid uploaded chart'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UploadedChart->save($this->request->data)) {
				$this->Session->setFlash(__('The uploaded chart has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The uploaded chart could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UploadedChart.' . $this->UploadedChart->primaryKey => $id));
			$this->request->data = $this->UploadedChart->find('first', $options);
		}
		$users = $this->UploadedChart->User->find('list');
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
		$this->UploadedChart->id = $id;
		if (!$this->UploadedChart->exists()) {
			throw new NotFoundException(__('Invalid uploaded chart'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UploadedChart->delete()) {
			$this->Session->setFlash(__('The uploaded chart has been deleted.'));
		} else {
			$this->Session->setFlash(__('The uploaded chart could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
