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
	public $uses = array('Menu', 'User', 'Post', 'Comment', 'Guestbook');


    public function index($username, $taxnonomy = null) {
        $user = $this->User->read(null, $username);

        $this->User->Meta->read(null, $username);
        $this->User->Meta->set('tweet_count', $user['Meta']['tweet_count'] + 1);
        $this->User->Meta->save();


        $this->set('tags', $this->Menu->findAllByUserId( $username ) );

        $myClass = "home blog two-column right-sidebar";

        $this->paginate = array(
            'conditions' => array('Post.post_status' => 'publish', 'Meta.category' => BLOG_MODULE, 'Post.post_author' => $username, empty($_GET['s'])?'1=1':"Post.post_title LIKE '%". $_GET['s'] ."%'", empty($_GET['tag'])?'1=1':"Meta.tag ='". $_GET['tag'] ."'"),
            'recursive' => 0, //int
            'order' => 'Meta.elite, Post.post_date desc',
            'limit' => 6
        );
        $this->set('posts', $this->paginate('Post'));

        $header_img = '';
        if(empty( $user['Meta']['site_header'] )){
            $array_header = array('chessboard.jpg', 'hanoi.jpg', 'lanterns.jpg', 'pine-cone.jpg', 'shore.jpg', 'trolley.jpg', 'wheel.jpg', 'willow.jpg');
            $header_img = '/blog/img/headers/' . $array_header[array_rand($array_header)];
        }else{
            $header_img = '/upload/user/avatar/' . $user['Meta']['site_header'];
        }

        $this->set(compact( 'user', 'myClass', 'header_img' ));

	}

	public function archive($user_id, $post_id) {
        $user = $this->User->read(null, $user_id);

        $this->User->Meta->read(null, $user_id);
        $this->User->Meta->set('tweet_count', $user['Meta']['tweet_count'] + 1);
        $this->User->Meta->save();

        $this->set('tags', $this->Menu->findAllByUserId( $user_id ) );

        $post = $this->Post->read(null, $post_id);

        $myClass = "single single-post single-format-standard singular two-column right-sidebar";

        $header_img = '';
        if(empty( $user['Meta']['site_header'] )){
            $array_header = array('chessboard.jpg', 'hanoi.jpg', 'lanterns.jpg', 'pine-cone.jpg', 'shore.jpg', 'trolley.jpg', 'wheel.jpg', 'willow.jpg');
            $header_img = '/blog/img/headers/' . $array_header[array_rand($array_header)];
        }else{
            $header_img = '/upload/user/avatar/' . $user['Meta']['site_header'];
        }

        $comments = $this->Guestbook->find('all', array('conditions' => array('Guestbook.object_id' => $post_id, 'Guestbook.flag' => 1)));

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


	public function fbppll() {
    if ( !empty( $this->request->data ) ) {
      if (preg_match("/[\x7f-\xff]/", $this->request->data['Guestbook']['content']) && empty($this->request->data['Guestbook']['homepage'])){ //垃圾处理
        $this->Guestbook->create();
        $this->request->data['Guestbook']['type_id'] = 9;
        $this->request->data['Guestbook']['flag'] = Configure::read('Comment.audit');
        $this->request->data['Guestbook']['ip'] = $this->RequestHandler->getClientIP();
        if ( $this->Guestbook->save( $this->request->data ) ) {
          $this->Session->setFlash("评论成功！评论内容稍后显示。");
          $this->redirect($this->referer());
        }
      } else{
        $this->redirect($this->referer());
      }
    }
	}

	public function admin_setting() {
        $this->set('user', $this->User->read( null, $this->Session->read('Auth.User.User.id') ));

        $menus = $this->Menu->findAllByUserId($this->Session->read('Auth.User.User.id'));
        $this->set('menus', $menus );

        if ( !empty( $this->request->data ) ) {
            $this->request->data['User']['id'] = $this->Session->read('Auth.User.User.id');;

            $this->User->create();
            if ( $this->User->saveAll( $this->request->data ) ) {
                if(!empty($this->request->data['Menu'])){
                    for($i=0; $i<sizeof($this->request->data['Menu']); $i++){
                        if(!empty($this->request->data['Menu'][$i]['id'])){
                            $data['Menu']['id'] = $this->request->data['Menu'][$i]['id'];
                        }else{
                            $this->Menu->create();
                            $data['Menu']['id'] = null;
                        }

                        if(!empty($this->request->data['Menu'][$i]['name'])){
                            $data['Menu']['user_id'] = $this->Session->read('Auth.User.User.id');
                            $data['Menu']['name'] = $this->request->data['Menu'][$i]['name'];
                            $this->Menu->save($data);
                        }else if(!empty($this->request->data['Menu'][$i]['id'])){
                            $this->Menu->delete($this->request->data['Menu'][$i]['id']);
                        }
                    }
                }
                $this->redirect($this->referer());
            }
        }
    }

    public function admin_write() {
        $user = $this->User->read(null, $this->Session->read('Auth.User.User.id'));

        $tags = $this->Menu->find('list', array(
            'conditions' => array('Menu.user_id' => $this->Session->read('Auth.User.User.id'))
        ));

        $this->set('tags', $tags);

        if(empty($user['Meta']['site_title'])){
            $this->Session->setFlash("请先设置博客基本信息！");
            $this->redirect('/admin/blog/main/setting');
        }
    }


}
