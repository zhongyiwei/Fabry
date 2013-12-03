<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Events Controller
 *
 * @property Event $Event
 * @property PaginatorComponent $Paginator
 */
class EventsController extends AppController {

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
        //$this->Event->recursive = 0;

        $events = $this->Paginator->paginate();
//		$data = array();
//		foreach ($allEvents as $key => $value) {
//			if($value['Event']['user_id'] == $this->current_user['id'])
//			{
//
//				array_push($data, $value);
//
//			}
//		}
//		$this->set('events', $data);
        $this->set('events', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
        $invitationData = $this->Invitation->find('all', array('conditions' => array('events_id' => $id)));
        $this->set('event', $this->Event->find('first', $options));
        $this->set(compact("invitationData"));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
//        $userName = $this->User->find("list", array('fields' => array('id', 'firstName')));

        $users = $this->User->find('all', array('fields' => array('firstName', 'lastName', 'email', 'id')));
//        debug($users);
//        $userName = Set::combine($users, '{n}.User.id', array('{0} {1} ( {2} )', '{n}.User.firstName', '{n}.User.lastName', '{n}.User.email'));

        if ($this->request->is('post')) {
            $uId = $this->current_user['id'];
            $this->request->data['Event']['user_id'] = $uId;
//            $selectedUsers = $this->request->data['Event']['users'];

            $userEmail = $this->User->find('all');

            if ($this->Event->save($this->request->data)) {

                $eventData = $this->Event->find('all', array('order' => 'id DESC', 'limit' => 1));
//                $eventId = $this->Event->getLastInsertID();
                $eventId = $eventData[0]['Event']['id'];
//                for ($i = 0; $i < count($selectedUsers); $i++) {
//                    $this->request->data['Invitation']['users_id'] = $selectedUsers[$i];
                for ($j = 0; $j < count($userEmail); $j++) {
                    $data[$j] = array('id' => '', 'users_id' => $userEmail[$j]['User']['id'], 'events_id' => $eventId, 'response_status' => 'No Respond');
                }
//                    $this->request->data['Invitation']['users_id'] = $userEmail[$i]['User']['id'];
//                    $this->request->data['Invitation']['events_id'] = $eventId;
//                    $this->request->data['Invitation']['response_status'] = "No Respond";
//                    $userEmail = $this->User->find('all', array('conditions' => array('id' => $selectedUsers[$i])));
//                    debug($userEmail);


                if ($this->Invitation->saveMany($data)) {
                    for ($i = 0; $i < count($userEmail); $i++) {
                        $userEmailOne = $userEmail[$i]['User']['email'];
                        $userIdOne = $userEmail[$i]['User']['id'];

                        $email = new CakeEmail();
                        $email->config('default');
                        $email->emailFormat('html');
                        $email->from(array("$this->sender" => "$this->senderTag"));


                        $email->to("$userEmailOne");
                        $title = $this->request->data['Event']['title'];

                        $AttendLink = "<a href=" . Router::url("/invitations/attendStatus?eventId=$eventId&uId=$userIdOne&status=Attend", true) . ">Attend the Event</a>";
                        $NoAttendLink = "<a href=" . Router::url("/invitations/attendStatus?eventId=$eventId&uId=$userIdOne&status=No", true) . ">Do Not Attend the Event</a>";
                        $InviteStatus = "<p>I will</p> <div> $AttendLink or $NoAttendLink</div> <p>this event. </p>   
                            ";
                        $description = "<div>" . $this->request->data['Event']['description'] . "</div>";
                        $email->subject($title);
                        $email->send($InviteStatus . $description);
                    }
                }
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array(), 'bad');
            }

            $this->Session->setFlash(__('The event has been saved.'), 'default', array(), 'good');
            return $this->redirect(array('action' => 'index'));
        }

        $this->set(compact("userName"));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        $users = $this->User->find('all', array('fields' => array('firstName', 'lastName', 'email', 'id')));
//        $userName = Set::combine($users, '{n}.User.id', array('{0} {1} ( {2} )', '{n}.User.firstName', '{n}.User.lastName', '{n}.User.email'));
        if ($this->request->is(array('post', 'put'))) {
//            $this->request->data['Event']['user_id'] = $this->current_user['id'];
//            $uId = $this->current_user['id'];
//            $this->request->data['Event']['user_id'] = $uId;
//            $selectedUsers = $this->request->data['Event']['users'];

            if ($this->Event->saveMany($this->request->data)) {
                $userEmail = $this->User->find('all');

//                for ($j = 0; $j < count($userEmail); $j++) {
//                    $data[$j] = array('id' => '', 'users_id' => $userEmail[$j]['User']['id'], 'events_id' => $id, 'response_status' => 'No Respond');
//                }

                for ($i = 0; $i < count($userEmail); $i++) {
//                $eventId = $this->Event->getLastInsertID();
//                for ($i = 0; $i < count($selectedUsers); $i++) {
//                    $this->request->data['Invitation']['users_id'] = $selectedUsers[$i];
//                    $this->request->data['Invitation']['events_id'] = $eventId;
                    $invitationId = $this->Invitation->find('all', array('conditions' => array('users_id' => $userEmail[$i]['User']['id'], 'events_id' => $id)));
                    if (!empty($invitationId)) {
//                        $this->request->data['Invitation']['id'] = $invitationId[0]['Invitation']['id'];
                        $data[$i] = array('id' =>  $invitationId[0]['Invitation']['id'], 'users_id' => $userEmail[$i]['User']['id'], 'events_id' => $id, 'response_status' => 'No Respond');
                    }

//                    $this->request->data['Invitation']['response_status'] = "No Respond";

//                    $userEmail = $this->User->find('all', array('conditions' => array('id' => $selectedUsers[$i])));
//                    debug($userEmail);
                    $userEmailOne = $userEmail[$i]['User']['email'];
                    $userIdOne = $userEmail[$i]['User']['id'];

                    if ($this->Invitation->saveMany($data)) {
                        $email = new CakeEmail();
                        $email->config('default');
                        $email->emailFormat('html');
                        $email->from(array("$this->sender" => "$this->senderTag"));

                        $email->to("$userEmailOne");
                        $title = $this->request->data['Event']['title'];

                        $AttendLink = "<a href=" . Router::url("/invitations/attendStatus?eventId=$id&uId=$userIdOne&status=Attend", true) . ">Attend the Event</a>";
                        $NoAttendLink = "<a href=" . Router::url("/invitations/attendStatus?eventId=$id&uId=$userIdOne&status=No", true) . ">Do Not Attend the Event</a>";
                        $InviteStatus = "<p>I will</p> <div> $AttendLink or $NoAttendLink</div> <p>this event. </p>   
                            ";
                        $description = "<div>" . $this->request->data['Event']['description'] . "</div>";
                        $email->subject($title);
                        $email->send($InviteStatus . $description);
                    }
                }

//            if ($this->Event->save($this->request->data)) {
//                $this->Session->setFlash(__('The event has been saved.'), 'default', array(), 'good');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array(), 'bad');
            }
        } else {
            $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
            $this->request->data = $this->Event->find('first', $options);
        }
        $this->set(compact("userName"));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Event->id = $id;
        if (!$this->Event->exists()) {
            throw new NotFoundException(__('Invalid event'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Event->delete()) {
            $this->Session->setFlash(__('The event has been deleted.'), 'default', array(), 'good');
        } else {
            $this->Session->setFlash(__('The event could not be deleted. Please, try again.'), 'default', array(), 'bad');
        }
        return $this->redirect(array('action' => 'index'));
    }
    


}

