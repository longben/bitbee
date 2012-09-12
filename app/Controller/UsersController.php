<?php
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
    public $components = array('Captcha');


    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow('*');
        $this->Auth->authenticate = array(
            AuthComponent::ALL => array('userModel' => 'User'),
            'Wordpress'
        );

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
        $this->Captcha->render();
    }

    /**
     * 后台登陆方法
     *
     * @return void
     */
    public function login33(){
        $this->layout = 'blank';
        if(!empty($this->data) && !empty($this->Auth->data['User']['user_login']) && !empty($this->Auth->data['User']['user_pass'])){

            CakeLog::write('debug', 'Something did not work');
            if($this->Auth->login()){
                if(isset($this->data['User']['captcha']) && $this->Session->read('captcha')!=$this->data['User']['captcha']){
                    $this->Session->setFlash(__('输入的验证码不正确', true));
                    $this->redirect($this->referer());
                }else{
                    $this->Session->write('id', $this->Session->read('Auth.User.ID'));
                    $this->Session->write('role', $this->data['User']['role']);
                    $this->redirect($this->Auth->redirect());
                }
            }
        }
    }

    /**
     * Admin login
     *
     * @return void
     * @access public
     */
    public function login() {
        $this->layout = "blank";
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect('/');
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
