<?php
App::uses('HyAppController', 'Hy.Controller');

/**
 * App Controller
 *
 */
class AppsController extends HyAppController {


    public $uses = array('Post', 'User', 'Attachment', 'Guestbook');

    //首页
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

        //新闻资讯(203)
        $conditions = array(
            'conditions' => 'Meta.category = 203', 
            'recursive' => 0, //int
            'order' => 'Post.post_date desc',
            'limit' => 4
        );
        $this->set('news', $this->Post->find('all', $conditions));

    }


    //产品
	public function product() {
        $this->layout = "website";
	}

    //公司概况
	public function intro() {
        $this->layout = "website";
	}

    //新闻中心
	public function news() {
        $this->layout = "website";
	}

    //客户中心
	public function service() {
        $this->layout = "website";
	}

    //专业知识
	public function knowledge() {
        $this->layout = "website";
	}

    //联系我们
	public function contact() {
        $this->layout = "website";
	}


}
