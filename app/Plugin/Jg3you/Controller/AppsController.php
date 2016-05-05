<?php
App::uses('Jg3youAppController', 'Jg3you.Controller');
/**
 * Apps Controller
 *
 */
class AppsController extends Jg3youAppController {


    public $uses = array('Post', 'User', 'Attachment', 'Guestbook', 'Code', 'Module', 'Setting', 'Booking', 'BookingOrder');

    public function beforeFilter() {
        parent::beforeFilter();

        //友情链接(204)
        $links = $this->Attachment->find('all', array('conditions' => array('Attachment.type_id' => 204), 'limit' => 5));
        $this->set('links', $links);

        $this->Setting->query("UPDATE settings SET value = value + 1 WHERE id = 10");
        $counter = $this->Setting->read('value',10);
        $this->set('counter', $counter['Setting']['value']);


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
        $this->set( 'wxbj', $this->getPostByCategory(BLOG_MODULE, 7) );


        $conditions = array(
            'conditions' => array('Meta.category' =>BLOG_MODULE, 'Meta.picture is NOT NULL'),
            'recursive' => 0, //int
            'order' => "Post.post_date DESC",
            'limit' => 7
        );
        $this->set( 'bktp', $this->Post->find('all', $conditions) );

        //最新消息(401)
        $this->set( 'news', $this->getPostByCategory(301, 8) );

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

        //国旗下的活动(303)
        $this->set( 'gqxdhd', $this->getPostByCategory(303, 5));

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
        $current_module = null;

        if( sizeof($menus) > 0){
            if( empty($child) ){
                $current = $menus[0]['Module']['id'];
            }else{
                $current = $child;
            }

            $current_module = $this->Module->read(null, $current);
            $this->set('cmodule', $current_module);

            $conditions = array(
                'conditions' => array('Module.parent_id' => $current),
                'recursive' => 0, //int
                'order' => 'Module.id'
            );
            $childs =$this->Module->find('all', $conditions);
            $this->set('childs', $childs);
            $this->set('current', $current);
        }

        if('system' == $current_module['Module']['type']){
            $this->paginate = array(
                'conditions' => array('Meta.site_title IS NOT NULL'),
                'recursive' => 0, //int
                'limit' => 30,
                'order' => 'Meta.order'
            );
            $this->set('users', $this->paginate('User'));

            $cssStyle = array( 'metro-roxo', 'metro-verde', 'metro-azul', 'metro-vermelho', 'metro-laranja');
            $this->set('cssStyle', $cssStyle);
        }else{
            $page = 0; //当前页面文章列表
            if( !empty($third) ){
                $page = $third;
                $this->findNewsByTag($page);
            }else{
                $page = $current;
                $this->_posts($page);
            }
        }
    }



    public function content($post_id){
        $post = $this->Post->read(null, $post_id);
        $this->set('post', $post);
        $this->set('title_for_layout', $post['Post']['post_title']);
    }

	public function booking($booking_id = 1){
        $booking = $this->Booking->read(null, $booking_id);
        $this->set('booking', $booking);

        if (!empty($this->data)) {
            //$this->Session->setFlash('TTT');

            if(empty($this->data['BookingOrder']['student'])){
                $this->Session->setFlash('学生姓名必添！');
            }elseif(empty($this->data['BookingOrder']['phone'])){
                $this->Session->setFlash('家长电话号码必须！');
            }else{

                $count = $this->BookingOrder->find('count', array(
                    'conditions' => array('BookingOrder.booking_id' => $booking_id, 'BookingOrder.phone' => $this->data['BookingOrder']['phone'] )
                ));

                if($count > 0){
                    $this->Session->setFlash('你已经抢票成功，请把机会留给其他小朋友！');
                }elseif($booking['Booking']['discount']==0){
                    $this->Session->setFlash('本轮讲座票已抢完，敬请期待下一期讲座。');
                }else{
                    $this->BookingOrder->create();
                    if ($this->BookingOrder->save($this->request->data)) {
                        $this->Booking->read(null, $booking_id);
                        $this->Booking->set(array(
                            'discount' => $booking['Booking']['discount'] - 1
                        ));
                        $this->Booking->save();
                        $this->Session->setFlash('抢票成功！');
                    } else {
                        $this->Session->setFlash('抢票失败！');
                    }
                }

            }

        }
        //$this->set('title_for_layout', $post['Post']['post_title']);
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

	public function search(){
        $this->set('title_for_layout', '搜索结果');
        $this->layout = 'website';

        $k = $this->request->data['keywords'];

        if(!empty($k)){
            $this->paginate = array(
                'conditions' => array('Post.post_status' => 'publish', "Post.post_title LIKE '%$k%'"),
                'recursive' => 0,
                'order' => 'Post.post_date desc',
            );
            $this->set('news', $this->paginate('Post'));
        }else{
            $this->set('news', NULL);
        }
    }


}
