<?php
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    function captcha(){
        $this->Captcha->render();
    }

/**
 * 后台登陆方法
 *
 * @return void
 */
    function login(){
        $this->layout = 'blank';
        if(!empty($this->data) && !empty($this->Auth->data['User']['user_login']) && !empty($this->Auth->data['User']['user_pass'])){
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

}
