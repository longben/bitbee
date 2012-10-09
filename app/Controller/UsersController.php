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

        $this->Auth->allow('login','captcha');    //不需验证便可访问的页面
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');    //登陆页面
        $this->Auth->loginRedirect = array('admin' => true,'controller' => 'platforms', 'action' => 'index');    //登陆后默认转向
        $this->Auth->authError = '用户名或密码错误';
        $this->Auth->authenticate = array('Wordpress');

    }

    /**
     * 更加条件查询用户JSON数据
     *
     * @return JSON
     */
    public function admin_json_data(){
        $this->findJSON4Grid('id', array('User.id <>' => 1)); //不返回Admin用户
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
     * Admin login
     *
     * @return void
     * @access public
     */
    public function login() {
        $this->layout = 'blank';


        if($this->Auth->loggedIn()){
            $this->redirect($this->Auth->redirect());
        }

        if($this->request->is('post')){
            
            if(isset($this->data['User']['captcha']) && $this->Session->read('captcha')!=$this->data['User']['captcha']){
                    $this->Session->setFlash(__('输入的验证码不正确', true));
            }else{
                if($this->Auth->login()){
                    $this->Session->write('id', $this->Session->read('Auth.User.User.id'));
                    $this->Session->write('role', $this->Session->read('Auth.User.Meta.role_id'));
                    $this->redirect($this->Auth->redirect());
                }else{
                    $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
                }
            }
  
        }
    }

    public function admin_login(){
        $this->login();
    }

    public function logout(){
        $this->Session->setFlash("你已经安全退出系统！");
        $this->redirect($this->Auth->logout()); 
    }


    public function admin_index($plugin = null){
		$roles = $this->User->Meta->Role->find('list');
		$departments = $this->User->Meta->Department->find('list');

        $genders = array('1' => '男', '0' => '女');

		$this->set(compact('roles', 'departments', 'genders', 'plugin'));        
    }

    public function admin_add() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {
            $this->User->create();  
            if ($this->User->saveAll($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_edit() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {    
            if ($this->User->saveAll($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true, 'msg' => 'OK'))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_delete() {
        if($this->request->is('post')){
            $this->User->id = $this->data['id'];
            if ($this->User->delete()) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            }else{
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }


    public function admin_json_department(){
        $this->autoRender = false;
        $k = $_GET['key'];
        $data = $this->User->Meta->Department->find('list');

        if($k != '0'){
            $k = explode(',', $k);
            $k = $k[1];
            $data = $this->User->find('list', array('conditions' => array('Meta.department_id' => $k), 'recursive' => 0));
        }

        return new CakeResponse( array('body' => json_encode($data)) );
    }

}
