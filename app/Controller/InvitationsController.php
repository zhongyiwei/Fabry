<?php

App::uses('AppController', 'Controller');

/**
 * Invitations Controller
 *
 * @property Invitation $Invitation
 * @property PaginatorComponent $Paginator
 */
class InvitationsController extends AppController {

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
        $this->Invitation->recursive = 0;
        $this->set('invitations', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Invitation->exists($id)) {
            throw new NotFoundException(__('Invalid invitation'));
        }
        $options = array('conditions' => array('Invitation.' . $this->Invitation->primaryKey => $id));
        $this->set('invitation', $this->Invitation->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $id = $this->current_user['id'];
        $this->request->data['Invitation']['users_id'] = $id;
        if ($this->request->is('post')) {

            $this->Invitation->create();
            if ($this->Invitation->save($this->request->data)) {
                $this->Session->setFlash(__('Thanks, your response to invitation has been saved.'),'default', array(), 'good');
                return $this->redirect(array('action' => 'eventParticipation'));
            } else {
                $this->Session->setFlash(__('The invitation could not be saved. Please, try again.'),'default', array(), 'bad');
            }
        }
//        $users = $this->Invitation->User->find('list');

        $invitation = $this->Invitation->find('all', array('conditions' => array('users_id' => $id)));
        $invitedIds = NULL;
//        debug($invitation);
        if (!empty($invitation)) {
            for ($i = 0; $i < count($invitation); $i++) {
                $invitedIds[$i] = $invitation[$i]['Invitation']['events_id'];
            }
        }
//        debug($invitedIds);
        $events = $this->Event->find('list', array('conditions' => array('id !=' => $invitedIds)));
//        debug($events);
        $this->set(compact('users', 'events'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Invitation->exists($id)) {
            throw new NotFoundException(__('Invalid invitation'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Invitation->save($this->request->data)) {
                $this->Session->setFlash(__('The invitation has been saved.'),'default', array(), 'good');
//                if ($this->current_user['role'] == "admin") {
                return $this->redirect(array('action' => 'index'));
//                } else {
//                    return $this->redirect(array('action' => 'eventParticipation'));
//                }
            } else {
                $this->Session->setFlash(__('The invitation could not be saved. Please, try again.'),'default', array(), 'bad');
            }
        } else {
            $options = array('conditions' => array('Invitation.' . $this->Invitation->primaryKey => $id));
            $this->request->data = $this->Invitation->find('first', $options);
        }
//        $users = $this->Invitation->User->find('list');
//        $events = $this->Invitation->Event->find('list');
        $this->set(compact('users', 'events'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Invitation->id = $id;
        if (!$this->Invitation->exists()) {
            throw new NotFoundException(__('Invalid invitation'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Invitation->delete()) {
            $this->Session->setFlash(__('The invitation has been deleted.'),'default', array(), 'good');
        } else {
            $this->Session->setFlash(__('The invitation could not be deleted. Please, try again.'),'default', array(), 'bad');
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function attendStatus() {
        $uid = $this->params['url']['uId'];
        $eventId = $this->params['url']['eventId'];
        $status = $this->params['url']['status'];
        if ($status == "No") {
            $status = "Do not attend";
        }

        $invitationId = $this->Invitation->find('all', array('conditions' => array('users_id' => $uid, 'events_id' => $eventId)));
        if (!empty($invitationId)) {
            $this->request->data['Invitation']['id'] = $invitationId[0]['Invitation']['id'];
        }
        $this->request->data['Invitation']['users_id'] = $uid;
        $this->request->data['Invitation']['events_id'] = $eventId;
        $this->request->data['Invitation']['response_status'] = $status;
        if ($this->Invitation->save($this->request->data)) {
            $this->Session->setFlash(__('The invitation has been saved.'), 'default', array(), 'good');
//            return $this->redirect(array('action' => 'index'));
            return $this->redirect(array('controller' => 'calendarEvents', 'action' => "calendarEvent"));
        } else {
            $this->Session->setFlash(__('The invitation could not be saved. Please, try again.'),'default', array(), 'bad');
        }
    }

    public function eventParticipation() {
        $id = $this->current_user['id'];
        $invitationData = $this->Invitation->find('all', array('conditions' => array('users_id' => $id)));
        
                $invitation = $this->Invitation->find('all', array('conditions' => array('users_id' => $id)));
        $invitedIds = NULL;
//        debug($invitation);
        if (!empty($invitation)) {
            for ($i = 0; $i < count($invitation); $i++) {
                $invitedIds[$i] = $invitation[$i]['Invitation']['events_id'];
            }
        }
//        debug($invitedIds);
        $events = $this->Event->find('list', array('conditions' => array('id !=' => $invitedIds)));
        $this->set(compact("invitationData",'events'));
    }

    public function editResponse($id = null) {
        if (!$this->Invitation->exists($id)) {
            throw new NotFoundException(__('Invalid invitation'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Invitation->save($this->request->data)) {
                $this->Session->setFlash(__('Thanks, your response to invitation has been updated.'),'default', array(), 'good');
                return $this->redirect(array('action' => 'eventParticipation'));
            } else {
                $this->Session->setFlash(__('The invitation could not be saved. Please, try again.'),'default', array(), 'bad');
            }
        } else {
            $options = array('conditions' => array('Invitation.' . $this->Invitation->primaryKey => $id));
            $this->request->data = $this->Invitation->find('first', $options);
        }
//        $users = $this->Invitation->User->find('list');
//        $events = $this->Invitation->Event->find('list');
        $this->set(compact('users', 'events'));
    }

}
