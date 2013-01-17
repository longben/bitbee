<?php
App::uses('Cd4youAppController', 'Cd4you.Controller');
/**
 * Apps Controller
 *
 */
class AppsController extends Cd4youAppController {


    public $uses = array('Post', 'User', 'Attachment', 'Guestbook', 'Code', 'Module');

    public function beforeFilter() {
        parent::beforeFilter(); 

        $this->layout = "website";
    }





    //首页
    public function index() {
        $this->layout = "website";

        
        $this->set('title_for_layout', '歡迎您！');

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

        //新闻资讯(203)
        $conditions = array(
            'conditions' => 'Meta.category IN (501,502)', 
            'recursive' => 0, //int
            'order' => 'Post.post_date desc',
            'limit' => 4
        );
        $this->set('news', $this->Post->find('all', $conditions));

    }

    //走进四幼
    public function aboutus(){

        $conditions = array(
            'conditions' => array('Module.parent_id' => 6), 
            'recursive' => 0, //int
            'order' => 'Module.id'
        );
        $this->set('menus', $this->Module->find('all', $conditions));

    }


}
