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

        $this->layout = "website";
    }





    //首页
    public function index() {
        $this->layout = "website";

        
        $this->set('title_for_layout', '欢迎您！');

        //大图轮换(202)
        $covers = $this->Attachment->find('all', array('conditions' => array('Attachment.type_id' => 202), 'limit' => 6));
        $this->set('covers', $covers);


        //友情链接(204)
        $links = $this->Attachment->find('all', array('conditions' => array('Attachment.type_id' => 204), 'limit' => 5));
        $this->set('links', $links);

        //产品特性(202)
        $conditions = array(
            'conditions' => 'Meta.category = 202', 
            'recursive' => 0, //int
            'order' => 'Meta.elite, Post.post_date desc',
            'limit' => 6
        );
        $this->set('features', $this->Post->find('all', $conditions));

        //最新消息(401)
        $this->set( 'news', $this->getPostByCategory(401, 8) );

        //校园公告(502，上每周工作安排)
        $this->set( 'xygg', $this->getPostByCategory(502, 6) );

        //全园大型活动(802)
        $this->set( 'qydxhd', $this->getPostByCategory(802, 7) );

        //特色领域活动(801)
        $this->set( 'tslyhd', $this->getPostByCategory(801, 7) );

        //教研动态
        $this->set( 'jydt', $this->getPostByCategorys('701,702', 5) );

        //家园共育
        $this->set( 'jygy', $this->getPostByCategorys('601,602', 7) );

        //温馨班级
        $this->set( 'wxbj', $this->getPostByCategorys(BLOG_MODULE, 7) );

        //集团建设
        $this->set( 'jtjs', $this->getPostByCategorys('1101,1102,1103', 5) );

        //早教中心
        $this->set( 'zjzx', $this->getPostByCategorys('1001,1002,1003', 7) );

        //营养健康
        $this->set( 'yyjk', $this->getPostByCategorys('1401,1402', 7) );

        //资源共享
        $this->set( 'zygx', $this->getPostByCategorys('1201,1202,1203', 7) );

        //在线办事
        $this->set( 'zxbs', $this->getPostByCategorys(205, 7) );
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
