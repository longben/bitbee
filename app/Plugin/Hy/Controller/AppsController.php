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

       //产品特性(202)
        $conditions = array(
            'conditions' => 'Meta.category = 202', 
            'recursive' => 0, //int
            'order' => 'Meta.elite, Post.post_date desc',
            'limit' => 6
        );
        $this->set('features', $this->Post->find('all', $conditions));



	}


}
