<?php
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
    public $components = array('Session', 'Captcha');


    public function beforeFilter() {
        parent::beforeFilter();

        //$this->Auth->allow('*');

        //$this->Auth->allow('login','captcha');    //不需验证便可访问的页面
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');    //登陆页面
        $this->Auth->loginRedirect = array('controller' => 'platforms', 'action' => 'index');    //登陆后默认转向
        $this->Auth->authenticate = array('Wordpress');

        /*
        $this->Auth->authenticate = array(
            AuthComponent::ALL => array('userModel' => 'User'),
            'Wordpress'
        );
         */

        if ($this->RequestHandler->ext === 'json') {
            $this->RequestHandler->setContent('json');
        }

    }

    /**
     * 后台登陆方法
     *
     * @return void
     */
    public function captcha(){
        $this->RequestHandler->respondAs('image/png');
        $this->autoRender = false;
        $this->Captcha->render();
    }

    /**
     * 后台登陆方法
     *
     * @return void
     */
    public function admin_login(){
        $this->layout = 'blank';

        if($this->Auth->loggedIn()){
            $this->redirect($this->Auth->redirect());
        }

        if($this->request->is('post')){
            if($this->Auth->login()){
                if(isset($this->data['User']['captcha']) && $this->Session->read('captcha')!=$this->data['User']['captcha']){
                    $this->Session->setFlash(__('输入的验证码不正确', true));
                    $this->redirect($this->Auth->redirect());
                }else{
                    $this->Session->write('user', $this->Session->read('Auth.User'));
                    $this->Session->write('id', $this->Session->read('Auth.User.ID'));
                    $this->Session->write('role', $this->Session->read('Auth.User.role'));
                    $this->redirect($this->Auth->redirect());
                }
            }
        }
        $this->autoRender = false ;
        $this->render('/users/login');
    }

    /**
     * 后台登陆方法
     *
     * @return void
     */

    public function admin_logout() {
        $this->Session->setFlash("你已经安全退出系统！");
        $this->redirect($this->Auth->logout()); 
    }


    /**
     * Admin login
     *
     * @return void
     * @access public
     */
    public function login() {
        $this->layout = "blank";
        if($this->Auth->loggedIn()){
            $this->redirect($this->Auth->redirect());
        }
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect('/admin/platforms/');
            } else {
                $this->Session->setFlash('ERROR!');
                $this->redirect($this->Auth->loginAction);
            }
        }

    }

    public function logout(){
        $this->Session->setFlash("你已经安全退出系统！");
        $this->redirect($this->Auth->logout()); 
    }

}
