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
            'conditions' => array('Module.parent_id' => 7), 
            'recursive' => 0, //int
            'order' => 'Module.id'
        );
        $this->set('menus', $this->Module->find('all', $conditions));

    }

    public function page($id, $child = null, $third = null){

        $this->set('module', $this->Module->read(null, $id)); 

        $conditions = array(
            'conditions' => array('Module.parent_id' => $id), 
            'recursive' => 0, //int
            'order' => 'Module.id'
        );
        $menus =$this->Module->find('all', $conditions);
        $this->set('menus', $menus);

        $current = $child;
        if( sizeof($menus) > 0){
            if( empty($child) ){
                $current = $menus[0]['Module']['id'];
            }else{
                $current = $child;
            }
            $conditions = array(
                'conditions' => array('Module.parent_id' => $current), 
                'recursive' => 0, //int
                'order' => 'Module.id'
            );
            $childs =$this->Module->find('all', $conditions);
            $this->set('childs', $childs);
            $this->set('current', $current);


            $this->set('cmodule', $this->Module->read(null, $current)); 
        }

        $page = 0; //当前页面文章列表
        if( !empty($third) ){
            $page = $third;
            $this->findNewsByTag($page);
        }else{
            $page = $current;
            $this->_posts($page);
        }

    }



    public function content($post_id, $id, $child = null, $third = null){

        $this->set('module', $this->Module->read(null, $id)); 

        $conditions = array(
            'conditions' => array('Module.parent_id' => $id), 
            'recursive' => 0, //int
            'order' => 'Module.id'
        );
        $menus =$this->Module->find('all', $conditions);
        $this->set('menus', $menus);

        $current = $child;
        if( sizeof($menus) > 0){
            if( empty($child) ){
                $current = $menus[0]['Module']['id'];
            }else{
                $current = $child;
            }
            $conditions = array(
                'conditions' => array('Module.parent_id' => $current), 
                'recursive' => 0, //int
                'order' => 'Module.id'
            );
            $childs =$this->Module->find('all', $conditions);
            $this->set('childs', $childs);
            $this->set('current', $current);


            $this->set('cmodule', $this->Module->read(null, $current)); 
        }

        $this->set('post', $this->Post->read(null, $post_id));

    }

}
