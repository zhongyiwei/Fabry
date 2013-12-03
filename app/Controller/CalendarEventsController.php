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

        $appointmentData = $this->Appointment->find('all', array('conditions' => array('users_id' => $id)));

        $invitationData = $this->Invitation->find('all', array('conditions' => array('users_id' => $id, 'response_status' => 'Attend')));
        $medicationData = $this->Medication->find('all', array('conditions' => array('users_id' => $id),'limit'=>10));
        $this->set(compact('eventData', 'appointmentData', 'invitationData','medicationData'));
    }

}

