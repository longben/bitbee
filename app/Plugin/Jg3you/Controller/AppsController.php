<?php
App::uses('Jg3youAppController', 'Jg3you.Controller');
/**
 * Apps Controller
 *
 */
class AppsController extends Jg3youAppController {


    public $uses = array('Post', 'User', 'Attachment', 'Guestbook', 'Code', 'Module');

    public function beforeFilter() {
        parent::beforeFilter(); 

        //友情链接(204)
        $links = $this->Attachment->find('all', array('conditions' => array('Attachment.type_id' => 204), 'limit' => 5));
        $this->set('links', $links);

        $this->layout = "website";
    }





    //首页
    public function index() {
        $this->layout = "website";

        
        $this->set('title_for_layout', '欢迎您！');

        //大图轮换(202)
        $covers = $this->Attachment->find('all', array('conditions' => array('Attachment.type_id' => 202), 'limit' => 6));
        $this->set('covers', $covers);

        //温馨班级
        $this->set( 'wxbj', $this->getPostByCategorys(BLOG_MODULE, 7) );

        //最新消息(401)
        $this->set( 'news', $this->getPostByCategory(401, 8) );

        //本园研究(501，本园教研)
        $this->set( 'byyj', $this->getPostByCategory(501, 8) );

        //家委会活动(601)
        $this->set( 'jwhhd', $this->getPostByCategory(601, 7) );

        //保育保健活动(802)
        $this->set( 'bybjhd', $this->getPostByCategory(802, 7) );

        //教师随笔(502)
        $this->set( 'jssb', $this->getPostByCategory(502, 7) );

        //每周安排(302)
        $this->set( 'mzap', $this->getPostByCategory(302, 5));

        //温馨提示(205)
        $this->set( 'wxts', $this->getPostByCategory(205, 5));
        
        //每周食谱(803)
        $this->set( 'mzsp', $this->getPostByCategory(803, 5));
    }

    public function page($id, $child = null, $third = null){


        $module = $this->Module->read(null, $id); 
        $this->set('module', $module); 

        $this->set('title_for_layout', $module['Module']['name']);

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



    public function __content($post_id, $id, $child = null, $third = null){

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

    
    public function content($post_id){
        $post = $this->Post->read(null, $post_id);
        $this->set('post', $post);
        $this->set('title_for_layout', $post['Post']['post_title']);
    }


    public function mailbox(){
        $this->layout = "website";
        $this->set('title_for_layout', '园长信箱');

        $this->paginate = array(
            'conditions' => array('Guestbook.flag' => 1, 'Guestbook.type_id' => 1), 
            'recursive' => 0, //int
            'order' => 'Guestbook.created desc',
            'limit' => 11
        );
        $this->set('guestbooks', $this->paginate('Guestbook'));
    }


	public function add_guestbook($type_id = 1) {
        //$this->autoRender = false;
        if (!empty($this->data)) {
            $_msg = '';
            $_url = '';
            switch ($type_id) {
            case 1:
                $_msg = '信息已提交。我们将在1-2个工作日内回复您！';
                $_url = '/app/mailbox';
                break;
            case 2:
                $_msg = '您的试听申请已提交，我们将在1-2个工作日内联系您！';
                $_url = '/app/main';
                break;
             case 3:
                $_msg = '您的加盟申请已提交，我们将在1-2个工作日内联系您！';
                $_url = '/app/joinus';
                break;
            }
            $this->Guestbook->create();
            if ($this->Guestbook->save($this->request->data)) {
                $this->Session->setFlash($_msg);
                $this->redirect($_url);
            } else {
                $this->Session->setFlash(__('保存失败！'));
            }
        }
    }

    public function blog(){
        $this->set('title_for_layout', '博客');
        $this->layout = 'website';
        $this->paginate = array(
            'conditions' => array('Meta.site_title IS NOT NULL'), 
            'recursive' => 0 //int
            //'order' => 'Guestbook.created desc',
        );
        $this->set('users', $this->paginate('User'));

        $cssStyle = array( 'metro-roxo', 'metro-verde', 'metro-azul', 'metro-vermelho', 'metro-laranja');
        $this->set('cssStyle', $cssStyle);

    }


}
