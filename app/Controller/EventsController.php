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
        $templates = $this->Template->find("all");

        if ($this->request->is('post')) {
            $uId = $this->current_user['id'];
            $this->request->data['Event']['user_id'] = $uId;
//            $selectedUsers = $this->request->data['Event']['users'];
            $this->request->data['Event']['send_status'] = 'false';

            $userEmail = $this->User->find('all');

            $this->request->data['Event']['start'] = date('Y-m-d H:i', strtotime($this->request->data['Event']['start']));
            $this->request->data['Event']['end'] = date('Y-m-d H:i', strtotime($this->request->data['Event']['end']));
            $startDate = strtotime($this->request->data['Event']['start']);
            $endDate = strtotime($this->request->data['Event']['end']);

            if ($startDate < $endDate) {
                if ($this->Event->save($this->request->data)) {

                    $eventData = $this->Event->find('all', array('order' => 'id DESC', 'limit' => 1));
//                $eventId = $this->Event->getLastInsertID();
                    $eventId = $eventData[0]['Event']['id'];
//                for ($i = 0; $i < count($selectedUsers); $i++) {
//                    $this->request->data['Invitation']['users_id'] = $selectedUsers[$i];
                    for ($j = 0; $j < count($userEmail); $j++) {
                        if ($userEmail[$j]['User']['role'] != 'admin') {
                            $data[$j] = array('id' => '', 'users_id' => $userEmail[$j]['User']['id'], 'events_id' => $eventId, 'response_status' => 'No Respond');
                        } else {
                            $data[$j] = array('id' => '', 'users_id' => $userEmail[$j]['User']['id'], 'events_id' => $eventId, 'response_status' => 'Attend');
                        }
                    }
//                    $this->request->data['Invitation']['users_id'] = $userEmail[$i]['User']['id'];
//                    $this->request->data['Invitation']['events_id'] = $eventId;
//                    $this->request->data['Invitation']['response_status'] = "No Respond";
//                    $userEmail = $this->User->find('all', array('conditions' => array('id' => $selectedUsers[$i])));
//                    debug($userEmail);


                    if ($this->Invitation->saveMany($data)) {
//                    for ($i = 0; $i < count($userEmail); $i++) {
//                        $userEmailOne = $userEmail[$i]['User']['email'];
//                        $userIdOne = $userEmail[$i]['User']['id'];
//
//                        $email = new CakeEmail();
//                        $email->config('default');
//                        $email->emailFormat('html');
//                        $email->from(array("$this->sender" => "$this->senderTag"));
//
//
//                        $email->to("$userEmailOne");
//                        $title = $this->request->data['Event']['title'];
//
//                        $AttendLink = "<a href=" . Router::url("/invitations/attendStatus?eventId=$eventId&uId=$userIdOne&status=Attend", true) . ">YES! I will attend the event</a>";
//                        $NoAttendLink = "<a href=" . Router::url("/invitations/attendStatus?eventId=$eventId&uId=$userIdOne&status=No", true) . ">NO! I will not attend the event</a>";
//                        $InviteStatus = "<div> $AttendLink &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; or &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $NoAttendLink</div>";
//                        $description = "<div>" . $this->request->data['Event']['description'] . "</div>";
//                        $email->subject($title);
//                        $email->send($InviteStatus . $description);

                        $this->Session->setFlash(__('The event invitation has been saved.'), 'default', array(), 'good');
                        return $this->redirect(array('action' => 'index'));
//                    }
                    }
                } else {
                    $this->Session->setFlash(__('The event invitation could not be saved. Please, try again.'), 'default', array(), 'bad');
                }
            } else {
                $this->Session->setFlash(__('The start date should be earlier than end date, please choose again.'));
            }
        }

        $this->set(compact("userName", "templates"));
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
            $this->request->data['Event']['start'] = date('Y-m-d H:i', strtotime($this->request->data['Event']['start']));
            $this->request->data['Event']['end'] = date('Y-m-d H:i', strtotime($this->request->data['Event']['end']));
            $startDate = strtotime($this->request->data['Event']['start']);
            $endDate = strtotime($this->request->data['Event']['end']);

            if ($startDate < $endDate) {
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
                            $data[$i] = array('id' => $invitationId[0]['Invitation']['id'], 'users_id' => $userEmail[$i]['User']['id'], 'events_id' => $id);
                        }

//                    $this->request->data['Invitation']['response_status'] = "No Respond";
//                    $userEmail = $this->User->find('all', array('conditions' => array('id' => $selectedUsers[$i])));
//                    debug($userEmail);
//                    $userEmailOne = $userEmail[$i]['User']['email'];
//                    $userIdOne = $userEmail[$i]['User']['id'];
//
////                    if ($this->Invitation->saveMany($data)) {
//                    $email = new CakeEmail();
//                    $email->config('default');
//                    $email->emailFormat('html');
//                    $email->from(array("$this->sender" => "$this->senderTag"));
//
//                    $email->to("$userEmailOne");
//                    $title = $this->request->data['Event']['title'];
//
//                    $AttendLink = "<a href=" . Router::url("/invitations/attendStatus?eventId=$eventId&uId=$userIdOne&status=Attend", true) . ">YES! I will attend the event</a>";
//                    $NoAttendLink = "<a href=" . Router::url("/invitations/attendStatus?eventId=$eventId&uId=$userIdOne&status=No", true) . ">NO! I will not attend the event</a>";
//                    $InviteStatus = "<div> $AttendLink &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; or &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $NoAttendLink</div>";
//                    $description = "<div>" . $this->request->data['Event']['description'] . "</div>";
//                    $email->subject($title);
//                        $email->send($InviteStatus . $description);
//                    }
                    }

//            if ($this->Event->save($this->request->data)) {
//                $this->Session->setFlash(__('The event has been saved.'), 'default', array(), 'good');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array(), 'bad');
                }
            } else {
                $this->Session->setFlash(__('The start date should be earlier than end date, please choose again.'));
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

        $userEmail = $this->User->find('all');
        $event = $this->Event->read(null, $id);

        for ($i = 0; $i < count($userEmail); $i++) {
            $userEmailOne = $userEmail[$i]['User']['email'];

            $email = new CakeEmail();
            $email->config('default');
            $email->emailFormat('html');
            $email->from(array("$this->sender" => "$this->senderTag"));


            $email->to("$userEmailOne");
            $title = "Cancellation of Event: " . $event['Event']['title'];

            $timeLimits = 60 * 60;
            set_time_limit($timeLimits);
            $date = $event['Event']['start'];
            $date = date('d-m-Y', strtotime($date));
            $time = $event['Event']['start'];
            $time = date('H:i', strtotime($time));
            $description = "Dear Members of Fabry: <br/> This is to inform you the event: " . $event['Event']['title'] . " on the" . $date ." at ". $time . " has been cancelled. Thank you for your kind concern. <br/> Best Regards</br>Team Fabry ";
            $email->subject($title);
            $email->send($description);
        }

        if ($this->Event->delete()) {
            $this->Session->setFlash(__('The event has been cancelled and cancallation email has been sent.'), 'default', array(), 'good');
        } else {
            $this->Session->setFlash(__('The event could not be cancalled. Please, try again.'), 'default', array(), 'bad');
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function emailsubscriber($id = null) {
        $this->Event->id = $id;
        $event = $this->Event->read(null, $id);
        $userEmail = $this->User->find('all');

        $this->request->data['Event']['send_status'] = 'true';
        $this->Event->saveField('send_status', $this->request->data['Event']['send_status']);

        for ($i = 0; $i < count($userEmail); $i++) {
            $userEmailOne = $userEmail[$i]['User']['email'];
            $userIdOne = $userEmail[$i]['User']['id'];

            $email = new CakeEmail();
            $email->config('default');
            $email->emailFormat('html');
            $email->from(array("$this->sender" => "$this->senderTag"));


            $email->to("$userEmailOne");
            $title = $event['Event']['title'];

            $AttendLink = "<a href=" . Router::url("/invitations/attendStatus?eventId=$id&uId=$userIdOne&status=Attend", true) . ">YES! I will attend the event</a>";
            $NoAttendLink = "<a href=" . Router::url("/invitations/attendStatus?eventId=$id&uId=$userIdOne&status=No", true) . ">NO! I will not attend the event</a>";
            $InviteStatus = "<div> $AttendLink &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; or &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $NoAttendLink</div>";
            $description = "<div>" . $event['Event']['description'] . "</div>";
            $email->subject($title);
            $email->send($InviteStatus . $description);
        }
        $this->Session->setFlash(__('The event invitation email has been send'), 'default', array(), 'good');
        return $this->redirect(array('action' => 'index'));
    }

}
