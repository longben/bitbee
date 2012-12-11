<?php
App::uses('HyAppController', 'Hy.Controller');

/**
 * App Controller
 *
 */
class AppsController extends HyAppController {


    public $uses = array('Post', 'User', 'Attachment', 'Guestbook');

	public function index() {
        $this->layout = "website";

        //大图轮换(201)
        $covers = $this->Attachment->find('all', array('conditions' => array('Attachment.type_id' => 201), 'limit' => 6));
        $this->set('covers', $covers);

	}


}
