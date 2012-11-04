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
	public $uses = array('Menu', 'User', 'Post');


    public function index($username) {
        $user = $this->User->read(null, $username);

        $posts = $this->Post->find('all');

        $myClass = "home blog two-column right-sidebar";

        $conditions = array(
            'conditions' => array('Post.post_status' => 'publish'), 
            'recursive' => 0, //int
            'order' => 'Meta.elite, Post.post_date desc',
            'limit' => 6
        );
        $posts = $this->Post->find('all', $conditions);

        $header_img = '';
        if(empty( $user['Meta']['site_header'] )){
            $array_header = array('chessboard.jpg', 'hanoi.jpg', 'lanterns.jpg', 'pine-cone.jpg', 'shore.jpg', 'trolley.jpg', 'wheel.jpg', 'willow.jpg');
            $header_img = $array_header[array_rand($array_header)];
        }

        $this->set(compact( 'user', 'posts', 'myClass', 'header_img' ));

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

        $this->set(compact( 'user', 'post',  'myClass',  'header_img' ));
	}


}
