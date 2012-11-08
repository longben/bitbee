<?php
App::uses('BlogAppController', 'Blog.Controller');
/**
 * Main Controller
 *
 */
class MainController extends BlogAppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Main';

/**
 * Models used by the Controller
 *
 * @var array
 * @access public
 */
	public $uses = array('Menu', 'User', 'Post', 'Comment');


    public function index($username) {
        $user = $this->User->read(null, $username);

        $myClass = "home blog two-column right-sidebar";

        $this->paginate = array(
            'conditions' => array('Post.post_status' => 'publish', 'Meta.category' => '1102', 'Post.post_author' => $username, empty($_GET['s'])?'1=1':"Post.post_title LIKE '%". $_GET['s'] ."%'"), 
            'recursive' => 0, //int
            'order' => 'Meta.elite, Post.post_date desc',
            'limit' => 6
        );
        $this->set('posts', $this->paginate('Post'));

        $header_img = '';
        if(empty( $user['Meta']['site_header'] )){
            $array_header = array('chessboard.jpg', 'hanoi.jpg', 'lanterns.jpg', 'pine-cone.jpg', 'shore.jpg', 'trolley.jpg', 'wheel.jpg', 'willow.jpg');
            $header_img = $array_header[array_rand($array_header)];
        }

        $this->set(compact( 'user', 'myClass', 'header_img' ));

	}

	public function archive($user_id, $post_id) {
        $user = $this->User->read(null, $user_id);
        $post = $this->Post->read(null, $post_id);

        $myClass = "single single-post single-format-standard singular two-column right-sidebar";

        $header_img = '';
        if(empty( $user['Meta']['site_header'] )){
            $array_header = array('chessboard.jpg', 'hanoi.jpg', 'lanterns.jpg', 'pine-cone.jpg', 'shore.jpg', 'trolley.jpg', 'wheel.jpg', 'willow.jpg');
            $header_img = $array_header[array_rand($array_header)];
        }

        $comments = $this->Comment->find('all', array('conditions' => array('Comment.post_id' => $post_id)));

        $neighbors = $this->Post->find('neighbors', array('field' => 'id', 'value' => $post_id, 'conditions' => array('Post.post_author' => $user_id, 'Meta.category' => 1102)));

        $this->set(compact( 'user', 'post',  'myClass',  'header_img', 'comments' , 'neighbors'));
	}

	public function comment() {
        if ( !empty( $this->request->data ) ) {
            $this->Comment->create();
            if ( $this->Comment->save( $this->request->data ) ) {
                $this->redirect($this->referer());
            } else {
            }
        }
	}

	public function admin_setting() {
        $this->set('user', $this->User->read( null, $this->Session->read('Auth.User.User.id') ));
        if ( !empty( $this->request->data ) ) {
            $this->request->data['User']['id'] = $this->Session->read('Auth.User.User.id');;

            $this->User->create();
            if ( $this->User->saveAll( $this->request->data ) ) {
                $this->redirect($this->referer());
            } else {
            }
        }
	}

	public function admin_write() {
        $user = $this->User->read(null, $this->Session->read('Auth.User.User.id'));
        if(empty($user['Meta']['site_title'])){
            $this->Session->setFlash("请先设置博客基本信息！");
            $this->redirect('/admin/blog/main/setting');
        }
	}


}
