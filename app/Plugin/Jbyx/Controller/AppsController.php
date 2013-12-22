<?php
App::uses('JbyxAppController', 'Jbyx.Controller');
/**
 * Apps Controller
 *
 */
class AppsController extends JbyxAppController {
  public $uses = array('Post', 'User', 'Attachment', 'Guestbook', 'Code',
    'Module', 'Polls.Polls', 'Polls.PollOption', 'Polls.PollVote');

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

    //班级博客
    $this->set( 'bjbk', $this->getPostByCategory(BLOG_MODULE, 6) );

    //班级风采
    $conditions = array(
      'conditions' => array('Meta.category' =>BLOG_MODULE, 'Meta.picture is NOT NULL'),
      'recursive' => 0, //int
      'order' => "Post.post_date DESC",
      'limit' => 7
    );
    $this->set( 'bktp', $this->Post->find('all', $conditions) );

    //新闻动态(501,503)
    $this->set( 'news', $this->getPostByCategorys('501,503', 9) );

    //棋类文化(801)
    $this->set( 'qlwh', $this->getPostByCategory(801, 6) );

    //双语教学(802)
    $this->set( 'syjx', $this->getPostByCategory(802, 6) );

    //教改动态(701)
    $this->set( 'jgdt', $this->getPostByCategory(701, 6) );

    //教师论文(702)
    $this->set( 'jslw', $this->getPostByCategory(702, 6) );

    //每周工作安排(502)
    $this->set( 'mzgzap', $this->getPostByCategory(502, 5));

    //欢乐公开课(1001)
    $this->set( 'hlgkk', $this->getPostByCategory(1001, 6));

    //精品教案(703)
    $this->set( 'jpja', $this->getPostByCategory(703, 6));

    //科技之窗(803)
    $this->set( 'kjzc', $this->getPostByCategory(803, 6));

    //教学论坛(704)
    $this->set( 'jxlt', $this->getPostByCategory(704, 6));

    //家教分享(1101)
    $this->set( 'jjfx', $this->getPostByCategory(1101, 6));

    //网上调查
    $conditions = array(
      //'conditions' => array('Meta.category' =>BLOG_MODULE, 'Meta.picture is NOT NULL'),
      'recursive' => 0, //int
      'order' => "Polls.created DESC",
      'limit' => 5
    );
    $this->set( 'polls', $this->Polls->find('all', $conditions) );
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
        'limit' => 30
        //'order' => 'Guestbook.created desc',
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

  public function vote($id = null){
    $poll = $this->Polls->read(null, $id);

    $this->set('options', $this->PollOption->findAllByPollId($id));
    $this->set('poll', $poll);
  }


}
