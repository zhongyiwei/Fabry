<?php
App::uses('AppController', 'Controller');
/**
 * Uploads Controller
 *
 * @property Upload $Upload
 * @property PaginatorComponent $Paginator
 */
class UploadsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeRender() {
		$user_role = $this->Auth->user()['role'];
		if ($user_role == 'admin') {
			$this->redirect(array('controller' => 'pages', 'action' => 'display'));
		}
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Upload->recursive = 0;

		$user_id = $this->Auth->user()['id'];

		$options['conditions'] = array('user_id' => $user_id);
		$this->Paginator->settings = $options;

		$this->set('uploads', $this->Paginator->paginate('Upload'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Upload->exists($id)) {
			throw new NotFoundException(__('Invalid upload'), 'default',array(),'bad');
		}
		$options = array('conditions' => array('Upload.' . $this->Upload->primaryKey => $id));
		$this->set('upload', $this->Upload->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			//incorrect
			if ($this->saveWithFile($this->request->data)) {
			//if ($this->Upload->save($this->request->data)) {
				$this->Session->setFlash(__('The Upload has  been saved.'), 'default',array(),'good');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The upload could not be saved, Please, try again.'), 'default',array(),'bad');
			}
		}
		$users = $this->Upload->User->find('list');
		$this->set(compact('users'));
	}

	public function download($filename) {
		if ($filename == null) {
			throw new NotFoundException(__('No file to download'));
		}
		$this->response->file('upload/'.$filename, array('download' => true, 'name' => $filename));
	}

/**
 * upload method
 *
 * 
 */	

function saveWithFile($request) {

	$file = $request['Upload']['file'];	

	if ($file['error'] !== UPLOAD_ERR_OK) {
		return false;
	}

	if (!move_uploaded_file($file['tmp_name'], 'upload'.DS.$file['name'])) {
		return false;
	}
	
	$request['Upload']['user_id'] = $this->Auth->user()['id'];
	$request['Upload']['filename'] = $file['name'];
	//$request['Upload']['filesize'] = $file['size'];
	$request['Upload']['filemime'] = $file['type'];

	$this->Upload->create();

	if (!$this->Upload->save($request)) {
		return false;
	}

	return true;

}
	
/*
function uploadFile() {
  $file = $this->data['Upload']['file'];
  if ($file['error'] === UPLOAD_ERR_OK) {
    $id = String::uuid();
    if (move_uploaded_file($file['tmp_name'], APP.'uploads'.DS.$id)) {
      $this->request->data['Upload']['id'] = $id;
      $this->request->data['Upload']['user_id'] = $this->Auth->user('id');
	  $this->request->data['Upload']['title'] = $file['title'];
	  $this->request->data['Upload']['description'] = $file['description'];
	  $this->request->data['Upload']['filename'] = $file['name'];
      $this->request->data['Upload']['filesize'] = $file['size'];
      $this->request->data['Upload']['filemime'] = $file['type'];
      
	  $this->Upload->save($file);
	  debug($file);
	  return true;
    }
  }
  return false;
}
*/
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Upload->exists($id)) {
			throw new NotFoundException(__('Invalid upload'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			if ($this->Upload->save($this->request->data)) {
				$this->Session->setFlash(__('The upload has been saved.'), 'default',array(),'good');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The upload could not be saved. Please, try again.'), 'default',array(),'bad');
			}
		} else {
			$options = array('conditions' => array('Upload.' . $this->Upload->primaryKey => $id));
			$this->request->data = $this->Upload->find('first', $options);
		}
		$users = $this->Upload->User->find('list');
		$this->set(compact('users'));
	}

	
	
	
	/*
	
	if ($this->request->is('post')) {
			//incorrect
			if ($this->saveWithFile($this->request->data)) {
			//if ($this->Upload->save($this->request->data)) {
				$this->Session->setFlash(__('The Upload has  been saved.'), 'default',array(),'good');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The upload could not be saved, Please, try again.'), 'default',array(),'bad');
			}
		}
		$users = $this->Upload->User->find('list');
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
		$this->Upload->id = $id;
		if (!$this->Upload->exists()) {
			throw new NotFoundException(__('Invalid upload'), 'default',array(),'bad');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Upload->delete()) {
			$this->Session->setFlash(__('The upload has been deleted.'), 'default',array(),'good');
		} else {
			$this->Session->setFlash(__('The upload could not be deleted. Please, try again.'), 'default',array(),'bad');
		}
		return $this->redirect(array('action' => 'index'));
	}}
