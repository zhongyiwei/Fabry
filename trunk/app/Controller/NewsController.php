<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Vendor', 'phpMailer', array('file' => 'phpMailer/PHPMailerAutoload.php'));

/**
 * News Controller
 *
 * @property News $News
 */
class NewsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->News->recursive = 0;
        $this->set('news', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->News->id = $id;
        if (!$this->News->exists()) {
            throw new NotFoundException(__('Invalid news'));
        }
        $this->set('news', $this->News->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $templates = $this->Template->find("all");
        if ($this->request->is('post')) {
            $this->News->create();
            $this->request->data['News']['send_status'] = 'false';
            if ($this->News->save($this->request->data)) {
                $this->Session->setFlash(__('The news has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The news could not be saved. Please, try again.'), 'failure-message');
            }
        }
        $this->set(compact('users','templates'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->News->id = $id;
        if (!$this->News->exists()) {
            throw new NotFoundException(__('Invalid news'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->News->save($this->request->data)) {
                $this->Session->setFlash(__('The news has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The news could not be saved. Please, try again.'), 'failure-message');
            }
        } else {
            $this->request->data = $this->News->read(null, $id);
        }
        $this->set(compact('users'));
    }

    /**
     * delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->News->id = $id;
        if (!$this->News->exists()) {
            throw new NotFoundException(__('Invalid news'));
        }
        if ($this->News->delete()) {
            $this->Session->setFlash(__('News deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('News was not deleted'), 'failure-message');
        $this->redirect(array('action' => 'index'));
    }

    public function news_detail($id = null) {
        $this->News->id = $id;
        if (!$this->News->exists()) {
            throw new NotFoundException(__('Invalid news'));
        }
        $this->set('news', $this->News->read(null, $id));
    }

    public function preview($id = null) {
        $this->News->id = $id;
        if (!$this->News->exists()) {
            throw new NotFoundException(__('Invalid news'));
        }
        $this->set('news', $this->News->read(null, $id));
    }

    public function emailsubscriber($id = null) {
        $this->Session->setFlash(__('The emails has been successfully sent to subscribers.'));
        $this->News->id = $id;
        $news = $this->News->read(null, $id);
        $this->request->data['News']['send_status'] = 'true';
        $this->News->saveField('send_status', $this->request->data['News']['send_status']);
        $subscribers = $this->User->find('all');
//        debug($subscribers);

        for ($i = 0; $i < count($subscribers); $i++) {
//            $email = new CakeEmail();
//            $email->config('default');
//            $email->emailFormat('html');
//            $email->from(array("$this->sender" => "$this->senderTag"));
            $subscribersName = $subscribers[$i]['User']['email'];
//            $email->to("$subscribersName");
            $newsTitle = $news['News']['news_title'];
            $newsDesc = $news['News']['news_description'];
//
////            $email->attachments(array(
////                array('file' => Router::url($news['News']['pdf_name'], true),
////                    'mimetype' => 'application/pdf'
////                ),
////            ));
////            $email->attachments($news['News']['pdf_name']);
            $pdfName = $news['News']['pdf_name'];
////            $email->attachments(array(
////                'news.pdf' => array(
////                    'file' => "$pdfName",
////                    'mimetype' => 'application/pdf',
////
////                )
////            ));
////            debug($pdfName);
//           
////            $email->attachments(array('News.pdf' => array('data' => "/Uploads/files/BowelReport.pdf")));
//            $email->subject($newsTitle);
//            $email->send($newsDesc);

            $mail = new PHPMailer;
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup server
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'team61fabry';                            // SMTP username
            $mail->Password = 'ieteam61';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
            $mail->Port = 465;

            $mail->isHTML(true);
            $mail->From = "$this->sender";
            $mail->FromName = $this->senderTag;
            $mail->addAddress($subscribersName);

            $path = $_SERVER['DOCUMENT_ROOT'] . "$this->webroot" . "app/webroot/$pdfName";
            $mail->addAttachment($path);
            $mail->Subject = $newsTitle;
            $mail->Body = $newsDesc;

//            debug($path);
            $timeLimits = 60 * 60;
            set_time_limit($timeLimits);
            ini_set('memory_limit', '1024M');

            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                exit;
            }
            $this->Session->setFlash(__('The news has been send'));
        }
        $this->redirect(array('action' => 'index'));
    }

}
