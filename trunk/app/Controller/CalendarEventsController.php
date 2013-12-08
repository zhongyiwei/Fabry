<?php

App::uses('AppController', 'Controller');

/**
 * CalendarEvents Controller
 *
 * @property CalendarEvent $CalendarEvent
 * @property PaginatorComponent $Paginator
 */
class CalendarEventsController extends AppController {

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
        $this->CalendarEvent->recursive = 0;
        $this->set('calendarEvents', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->CalendarEvent->exists($id)) {
            throw new NotFoundException(__('Invalid calendar event'));
        }
        $options = array('conditions' => array('CalendarEvent.' . $this->CalendarEvent->primaryKey => $id));
        $this->set('calendarEvent', $this->CalendarEvent->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $id = $this->current_user['id'];
            $this->request->data['CalendarEvent']['users_id'] = $id;
            $startDate = strtotime($this->request->data['CalendarEvent']['start']);
            $endDate = strtotime($this->request->data['CalendarEvent']['end']);
            if ($startDate < $endDate) {
                $this->CalendarEvent->create();

                if ($this->CalendarEvent->save($this->request->data)) {
                    $this->Session->setFlash(__('The calendar event has been saved.'), 'default', array(), 'good');
                    return $this->redirect(array('action' => 'calendarEvent'));
                } else {
                    $this->Session->setFlash(__('The calendar event could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('The start date should be earlier than end date, please choose again.'));
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
        if (!$this->CalendarEvent->exists($id)) {
            throw new NotFoundException(__('Invalid calendar event'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $startDate = strtotime($this->request->data['CalendarEvent']['start']);
            $endDate = strtotime($this->request->data['CalendarEvent']['end']);
            if ($startDate < $endDate) {
                if ($this->CalendarEvent->save($this->request->data)) {
                    $this->Session->setFlash(__('The calendar event has been saved.'), 'default', array(), 'good');
                    return $this->redirect(array('action' => 'calendarEvent'));
                } else {
                    $this->Session->setFlash(__('The calendar event could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('The start date should be earlier than end date, please choose again.'));
            }
        } else {
            $options = array('conditions' => array('CalendarEvent.' . $this->CalendarEvent->primaryKey => $id));
            $this->request->data = $this->CalendarEvent->find('first', $options);
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
        $this->CalendarEvent->id = $id;
        if (!$this->CalendarEvent->exists()) {
            throw new NotFoundException(__('Invalid calendar event'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->CalendarEvent->delete()) {
            $this->Session->setFlash(__('The calendar event has been deleted.'), 'default', array(), 'good');
        } else {
            $this->Session->setFlash(__('The calendar event could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'calendarEvent'));
    }

    public function calendarEvent() {
        $id = $this->current_user['id'];
        $eventData = $this->CalendarEvent->find('all', array('conditions' => array('users_id' => $id)));

//        $contactId = $this->Contact->find('all', array('conditions' => array('users_id' => $id)));
//        $appointmentData = $this->Appointment->find('all', array('conditions' => array('users_id' => $contactId)));

        $appointmentData = $this->Appointment->find('all', array('conditions' => array('Appointment.users_id' => $id)));

        $invitationData = $this->Invitation->find('all', array('conditions' => array('users_id' => $id, 'response_status' => 'Attend')));
        $medicationData = $this->Medication->find('all', array('conditions' => array('users_id' => $id), 'limit' => 10));

        $calendarEvent = "";
        for ($i = 0; $i < count($eventData); $i++) {
            $status = ($eventData[$i]['CalendarEvent']['allDay'] == 1 ? "true" : "false");
            if ($eventData[$i]['CalendarEvent']['repeat'] == 0) {
                $calendarEvent .= "\n{\n";
                $calendarEvent .= "title:'" . $eventData[$i]['CalendarEvent']['title'] . "',\n";
                $calendarEvent .= "start:'" . $eventData[$i]['CalendarEvent']['start'] . "',\n";
                $calendarEvent .= "end:'" . $eventData[$i]['CalendarEvent']['end'] . "',\n";
                $calendarEvent .= "allDay:" . $status . ",\n";
                $calendarEvent .= "url:'" . $this->webroot . "calendarEvents/edit/" . $eventData[$i]['CalendarEvent']['id'] . "'";
                if ($i != (count($eventData) - 1)) {
                    $calendarEvent .= "\n},\n";
                } else {
                    $calendarEvent .= "\n}\n";
                }
            } else {
                $repeatingWeeks = 54;
                for ($j = 0; $j < $repeatingWeeks; $j++) {
                    $newStartDate = date('Y-m-d h:i:s', strtotime($eventData[$i]['CalendarEvent']['start']) + 7 * 24 * 3600 * $j);
                    $newEndDate = date('Y-m-d h:i:s', strtotime($eventData[$i]['CalendarEvent']['end']) + 7 * 24 * 3600 * $j);
                    $calendarEvent .= "\n{\n";
                    $calendarEvent .= "title:'" . $eventData[$i]['CalendarEvent']['title'] . "',\n";
                    $calendarEvent .= "start:'" . $newStartDate . "',\n";
                    $calendarEvent .= "end:'" . $newEndDate . "',\n";
                    $calendarEvent .= "allDay:" . $status . ",\n";
                    $calendarEvent .= "url:'" . $this->webroot . "calendarEvents/edit/" . $eventData[$i]['CalendarEvent']['id'] . "'";
//            if ($i != ($repeatingWeeks - 1)) {
                    $calendarEvent .= "\n},\n";
//            } else {
//                 $calendarEvent .= "\n}\n";
//            }
                }
            }
        }

        $appointmentEvent = "";
        for ($j = 0; $j < count($appointmentData); $j++) {
            $appointmentEvent .= "\n{\n";
            $appointmentEvent .= "title:'" . $appointmentData[$j]['Appointment']['description'] . "',\n";
            $appointmentEvent .= "start:'" . $appointmentData[$j]['Appointment']['date'] . "',\n";
            $appointmentEvent .= "allDay:false,\n";
            $appointmentEvent .= "url:'" . $this->webroot . "appointments/edit/" . $appointmentData[$j]['Appointment']['id'] . "'";
//    if ($j != (count($appointmentData) - 1)) {
            $appointmentEvent .= "\n},\n";
//    } else {
//        $appointmentEvent .= "\n}\n";
//    }
        }
//    $eventVariable['title'] = $eventData[$i]['CalendarEvent']['title'];
//    $eventVariable['start'] = $eventData[$i]['CalendarEvent']['start'];
//    $eventVariable['end'] = $eventData[$i]['CalendarEvent']['end'];
//    $eventVariable['allDay'] = ($eventData[$i]['CalendarEvent']['start'] == 0 ? true : false);
//
//    $appointmentEvent .= json_encode($eventVariable);

        $medicationEvent = "";
        for ($q = 0; $q < count($medicationData); $q++) {
            $repeatingTimes = $medicationData[$q]['Medication']['repeatTimes'];

            $repeatingHours = $medicationData[$q]['Medication']['frequency'];
            if ($repeatingHours == "Daily") {
                $repeatingHours = 24;
            } else if ($repeatingHours == "Every second day") {
                $repeatingHours = 48;
            } else if ($repeatingHours == "Once in three days") {
                $repeatingHours = 72;
            } else if ($repeatingHours == "Weekly") {
                $repeatingHours = 168;
            } else if ($repeatingHours == "Fortnightly") {
                $repeatingHours = 336;
            }
            for ($j = 0; $j < $repeatingTimes; $j++) {
                $newStartDate = date('Y-m-d h:i:s', strtotime($medicationData[$q]['Medication']['start']) + $repeatingHours * 3600 * $j);

                $medicationEvent .= "\n{\n";
                $medicationEvent .= "title:' Take " . $medicationData[$q]['Medication']['medicationName'] . "',\n";
                $medicationEvent .= "start:'" . $newStartDate . "',\n";
                $medicationEvent .= "allDay:false,\n";
                $medicationEvent .= "url:'" . $this->webroot . "medications/edit/" . $medicationData[$q]['Medication']['id'] . "'";
//        if ($q != (count($medicationData) - 1)) {
                $medicationEvent .= "\n},\n";
//        } else {
//            $medicationEvent .= "\n}\n";
//        }
            }
        }

        $eventGoingAttend = "";
        for ($p = 0; $p < count($invitationData); $p++) {
            $InviteAllDayStatus = ($invitationData[$p]['Events']['allDay'] == 1 ? "true" : "false");

            $eventGoingAttend .= "\n{\n";
            $eventGoingAttend .= "title:'" . $invitationData[$p]['Events']['title'] . "',\n";
            $eventGoingAttend .= "start:'" . $invitationData[$p]['Events']['start'] . "',\n";
            $eventGoingAttend .= "end:'" . $invitationData[$p]['Events']['end'] . "',\n";
            $eventGoingAttend .= "allDay:" . $InviteAllDayStatus . ",\n";
//    $eventGoingAttend .= "url:'" . $this->webroot . "invitation/edit/" . $invitationData[$p]['Appointment']['id'] . "'";
            if ($p != (count($invitationData) - 1)) {
                $eventGoingAttend .= "\n},\n";
            } else {
                $eventGoingAttend .= "\n}\n";
            }
        }
//    $eventVariable['title'] = $eventData[$i]['CalendarEvent']['title'];
//    $eventVariable['start'] = $eventData[$i]['CalendarEvent']['start'];
//    $eventVariable['end'] = $eventData[$i]['CalendarEvent']['end'];
//    $eventVariable['allDay'] = ($eventData[$i]['CalendarEvent']['start'] == 0 ? true : false);
//
//    $eventGoingAttend .= json_encode($eventVariable);

        $this->set(compact('eventData', 'appointmentData', 'invitationData', 'medicationData', 'calendarEvent', 'appointmentEvent', 'medicationEvent', 'eventGoingAttend'));
    }

}

