<?php

App::uses('AppController', 'Controller');

/**
 * Appointments Controller
 *
 * @property Appointment $Appointment
 * @property PaginatorComponent $Paginator
 */
class AppointmentsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');
    public $paginate = array();

    /**
     * index method
     *
     * @return void
     */
    public function index() {

        //$this->Appointment->recursive = 1;

        /*
         * Elisha:
          make an option so that the query selects the data by descending order
         */
//        $options = array();
//        $options['fields'] = array('
//			Appointment.id,
//			Appointment.description,
//			DATE_FORMAT(Appointment.date, "%d-%m-%Y") AS date,
//			DATE_FORMAT(Appointment.date, "%h:%i %p") AS time,
//			Contact.doctor'
//        );
//        $options['contain'] = array('Contact');
        //$data = $this->Appointment->find('all', $options);
//        $this->Paginator->settings = $options;
//        $columns = array('id', 'description', 'date', 'time', 'doctor');
//
//        $data = $this->Paginator->paginate('Appointment', array(), $columns);
//
//        $this->set('appointments', $data);
//        Debugger::log($data);
        $id = $this->current_user['id'];
        $appointments = $this->Appointment->find('all', array('conditions' => array('Contact.users_id' => $id)));
        $this->set(compact("appointments"));
        /*
          $allAppointments = $this->Paginator->paginate();
          $data = array();
          foreach ($allAppointments as $key => $value) {
          if($value['Appointment']['user_id'] == $this->Session->read('Auth')['User']['id'])
          {

          array_push($data, $value);

          }
          }
          $this->set('events', $data);
         */
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Appointment->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        //$options = array('conditions' => array('Appointment.' . $this->appointment->primaryKey => $id));
        $options = array('conditions' => array('Appointment.id' => $id));
        $this->set('appointment', $this->Appointment->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        // loads the contact data from the contact model
        $this->loadModel('Contact');

        // assigns all the contact data to the $contact variable	
        //$contacts = $this->Contact->find('all');
        //retrieve data as a list
        $id = $this->current_user['id'];
        $options = array('fields' => array('id', 'doctor'), 'conditions' => array('OR' => array(array('users_id' => $id), array('isOfficial' => 1))));
        //use list instead of all as is for a selectbox
        $contacts = $this->Contact->find('list', $options);

        // sets the variable $Contacts (with the contents of $contacts) so you can use it in view
        $this->set('contacts', $contacts);
        $redirect = $this->params['url']['redirect'];
        //saves the appointment and displays notification message
        if ($this->request->is('post')) {

            $this->request->data['Appointment']['users_id'] = $this->current_user['id'];
            if ($this->Appointment->save($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved.'), 'default', array(), 'good');
                /*
                 * Elisha
                 * just redirect after saving! :)
                 */
//                $contactId = $this->request->data['Appointment']['contact_id'];
//                
//                debug($contacts[$contactId]);
//                $id = $this->current_user['id'];
//                $this->request->data['CalendarEvent']['users_id'] = $id;
//                $this->request->data['CalendarEvent']['start']= $this->request->data['Appointment']['date'];
//                $this->request->data['CalendarEvent']['title'] = "Contact Person: ".$contacts[$contactId]." \nAppoinment Details: ".$this->request->data['Appointment']['description'];
//                
//                $this->CalendarEvent->create();
//
//                if ($this->CalendarEvent->save($this->request->data)) {
//                } else {
//                    $this->Session->setFlash(__('The calendar event could not be saved. Please, try again.'));
//                }
                if ($redirect == "calendar") {
                                        return $this->redirect(array('action' => 'calendarEvent','controller'=>'calendarevents'));
                } else {
                    $this->redirect(array('action' => "index"));
                }
            }

//            $this->redirect($this->referer());
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

        $this->loadModel('Contact');

        if (!$this->Appointment->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Appointment']['users_id'] = $this->current_user['id'];
            if ($this->Appointment->save($this->request->data)) {
                // good message color changing
                $this->Session->setFlash(__('The event has been saved.'), 'default', array(), 'good');
                return $this->redirect(array('action' => 'index'));
            } else {

                //bad message color changing
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array(), 'bad');
            }
        } else {

            //$options = array('conditions' => array('Appointment.' . $this->Appointment->primaryKey => $id));
            $options = array('conditions' => array('Appointment.id' => $id));
            $this->request->data = $this->Appointment->find('first', $options);

            $options = array('fields' => array('id', 'doctor'));
            $contacts = $this->Contact->find('list', $options);
            $this->set('contacts', $contacts);
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
        $this->Appointment->id = $id;
        if (!$this->Appointment->exists()) {
            throw new NotFoundException(__('Invalid event'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Appointment->delete()) {
            $this->Session->setFlash(__('The event has been deleted.'));
        } else {
            $this->Session->setFlash(__('The event could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}

