<?php

class AppsController extends WczhsAppController {

    public $name = 'Apps';

    public $uses = array('Post', 'User', 'Attachment', 'Guestbook', 'CourseMembership');

    /*  先屏蔽，冬天采用红色风格
	public $theme = 'Red';
	*/

    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->loginAction = array('plugin' => 'wczhs', 'controller' => 'apps', 'action' => 'login');    //登陆页面
        $this->Auth->loginRedirect = array('plugin' => 'wczhs', 'controller' => 'apps', 'action' => 'member');    //登陆后默认转向
        $this->Auth->authenticate = array('Wordpress');
        $this->Auth->authError = '您还未登录，请录入会员用户名及密码进行登录！若忘记用户名或密码，请与智慧树老师联系！';
        $this->Auth->deny('member', 'files');
    }

    public function test(){
        $this->autoRender = false;
        if($this->request->is('post')){
            if($this->Auth->login()){
                $this->Session->write('id', $this->Session->read('Auth.User.User.id'));
                $this->Session->write('role', $this->Session->read('Auth.User.Meta.role_id'));
                return new CakeResponse(array('body' => json_encode(array('msg'=>'OK', 'user_id' => $this->Session->read('Auth.User.User.id')))));
            }else{
                return new CakeResponse(array('body' => json_encode(array('msg'=>'用户名或者密码错误！'))));
            }
        }
    }

    /*
     ************************************************************************************************************
     *
     * 公共调用
     *
     ************************************************************************************************************/
    //新闻列表
    private function _news($id){
        $this->paginate = array(
            'conditions' => "Meta.category = $id",
            'recursive' => 0, //int
            'order' => 'Post.post_date desc',
            'limit' => 12
        );
        $this->set('news', $this->paginate());
    }

    //内容显示
    function content($id){
        $this->layout = "website";
        $post = $this->Post->read(null, $id);

        $this->set('title_for_layout', $post['Post']['post_title']);
        $this->set('post', $post);
    }

    /*
     ************************************************************************************************************
     *
     * 首页相关
     *
     ************************************************************************************************************/

    //跳转页
    function index(){
        $this->layout = 'blank';
    }

    //首页
    function main(){
        //$this->theme = 'Red';
        $this->layout="website";
        $this->set('title_for_layout', '欢迎您！');

        //大图轮换(201)
        $covers = $this->Attachment->find('all', array('conditions' => array('Attachment.type_id' => 201), 'limit' => 6));

        //课程介绍(1001)
        $conditions = array(
            'conditions' => 'Meta.category = 1001',
            'recursive' => 0, //int
            'order' => 'Meta.elite, Post.post_date desc',
            'limit' => 6
        );
        $this->set('courses', $this->Post->find('all', $conditions));

        //最新活动(图片显示)
        $conditions = array(
            'conditions' => 'Meta.elite = 1',
            'recursive' => 0, //int
            'order' => 'Post.post_date desc',
            'limit' => 6
        );
        $this->set('images', $this->Post->find('all', $conditions));

        //新闻资讯
        $conditions = array(
            'conditions' => 'Meta.category IN(401,402,403)',
            'recursive' => 0, //int
            'order' => 'Post.post_date desc',
            'limit' => 10
        );
        $this->set('news', $this->Post->find('all', $conditions));


        //宝宝作品(502)
        $conditions = array(
            'conditions' => 'Meta.category = 502',
            'recursive' => 0, //int
            'order' => 'Meta.elite, Post.post_date desc',
            'limit' => 6
        );
        $this->set('works', $this->Post->find('all', $conditions));

        //友情链接(206)
        $links = $this->Attachment->find('all', array('conditions' => array('Attachment.type_id' => 206), 'limit' => 5));

        $this->set(compact('covers', 'links'));
    }


    //关于我们
    function aboutus($page = '301'){
        $this->layout="website";

        switch ($page) {
        case 301:
            $show_title = "文化背景";
            break;
        case 302:
            $show_title = "教学理念";
            break;
        case 303:
            $show_title = "园所介绍";
            break;
        case 304:
            $show_title = "教师风采";
            break;
        }

        $this->set('title_for_layout', '关于我们');
        $this->set('aboutus_title_show', $show_title);

        if($page == 304){
            $conditions = array(
                'conditions' => "Meta.category = $page",
                'recursive' => 0, //int
                'order' => 'Post.post_date',
                'limit' => 6
            );
            $this->set('posts', $this->Post->find('all', $conditions));
        }

        $this->set('page', $page);
    }

    //最新资讯
    function news($page = 401, $title = '培训动态'){
        $this->layout="website";
        $this->set('title_for_layout', '最新资讯');

        $this->_news($page); //新闻列表

        $this->set(compact('page', 'title'));
    }

    //培训课程
    function course($page = 1001, $title = '课程介绍'){
        $this->layout="website";
        $this->set('title_for_layout', '培训课程');

        $this->paginate = array(
            'conditions' => "Meta.category = $page",
            'recursive' => 0, //int
            'order' => 'Post.post_date desc',
            'limit' => 9
        );
        $this->set('posts', $this->paginate());

        $this->set(compact('page', 'title'));
    }

    //学员天地
    public function student($page = 501, $title = '优秀学员'){
        $this->layout="website";
        $this->set('title_for_layout', '学员天地');

        $this->paginate = array(
            'conditions' => "Meta.category = $page",
            'recursive' => 0, //int
            'order' => 'Post.post_date desc',
            'limit' => 9
        );
        $this->set('posts', $this->paginate());

        $this->set(compact('page', 'title'));
    }

    //英语外教
    function english($page = '601'){
        $this->layout="website";

        switch ($page) {
        case 601:
            $show_title = "关于蒙台梭利";
            break;
        case 602:
            $show_title = "课程与服务";
            break;
        case 603:
            $show_title = "主题活动";
            break;
        case 604:
            $show_title = "精彩瞬间";
            break;
        }

        $this->set('title_for_layout', "英语外教");
        $this->set('english_title_show', $show_title);

        if(604 == $page){
            $this->_news(604);
        }


        $this->set('page', $page);
    }

    //加盟五彩智慧树
    function joinus($page = '701'){
        $this->layout="website";
        switch ($page) {
        case 701:
            $show_title = "项目介绍";
            break;
        case 702:
            $show_title = "加盟收益分析";
            break;
        case 703:
            $show_title = "支持保障";
            break;
        case 704:
            $show_title = "索取资料";
            break;
        }
        $this->set('title_for_layout', '加盟五彩智慧树');
        $this->set('joinus_title_show', $show_title);

        $this->set('page', $page);
    }

    //联系我们
    function contact($page = 'guestbook'){
        $this->layout="website";
        $this->set('title_for_layout', '联系我们');

        $show_title = '在线留言';
        switch ($page) {
        case '802':
            $show_title = "联系方式";
            break;
        case 'application':
            $show_title = "申请免费试听";
            break;
        }
        $this->set('show_title', $show_title);

        if('guestbook' == $page){
            $this->paginate = array(
                'conditions' => array('Guestbook.flag' => 1, 'Guestbook.type_id' => 1),
                'recursive' => 0, //int
                'order' => 'Guestbook.created desc',
                'limit' => 11
            );
            $this->set('guestbooks', $this->paginate('Guestbook'));
        }

        $this->set('page', $page);
    }

    //会员电子档案
    public function member($page = 'files'){
        $this->layout="website";
        $this->set('title_for_layout', '会员电子档案');

        $this->set(compact('page'));
    }

    public function files($id){
        $this->layout = 'website';
        $this->set('title_for_layout', '会员电子档案');

        //$this->CourseMembership->recursive = 2;
        $this->set('c', $this->CourseMembership->read(null, $id));
        $this->set('_serialize', array('c'));
    }


    //会员登录
    public function login(){
        $this->layout = 'website';
        $this->set('title_for_layout', '会员登录');
        if($this->Auth->loggedIn()){
            $this->redirect('/app/member/files');
        }

        if($this->request->is('post')){
            if($this->Auth->login()){
                $this->Session->write('id', $this->Session->read('Auth.User.User.id'));
                $this->Session->write('role', $this->Session->read('Auth.User.Meta.role_id'));
                $this->redirect($this->Auth->redirect());
            }else{
                $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
            }
        }
    }

    //会员登出
    public function logout(){
        $this->redirect($this->Auth->logout());
    }


    //博客
    public function blog(){
        $this->set('title_for_layout', '博客');
        $this->layout = 'website';
        $this->paginate = array(
            'conditions' => array('Meta.site_title IS NOT NULL'),
            'recursive' => 0, //int
            //'order' => 'Guestbook.created desc',
            'limit' => 11
        );
        $this->set('users', $this->paginate('User'));

        $cssStyle = array( 'metro-roxo', 'metro-verde', 'metro-azul', 'metro-vermelho', 'metro-laranja');
        $this->set('cssStyle', $cssStyle);

    }


}
?>
