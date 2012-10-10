<?php
App::uses('AppController', 'Controller');
/**
 * Guestbooks Controller
 *
 * @property Guestbook $Guestbook
 */
class GuestbooksController extends AppController {

	public function add($type_id = 1) {
        if (!empty($this->data)) {
            $_msg = '';
            $_url = '';
            switch ($type_id) {
            case 1:
                $_msg = '您的留言已成功提交，我们将在1个工作日内进行回复。';
                $_url = '/app/contact/guestbook';
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
                $this->Session->setFlash($_msg, true);
                $this->redirect($_url);
            } else {
                $this->Session->setFlash(__('保存失败！', true));
            }
        }
    }

    public function admin_json_data(){
        $this->findJSON4Grid('id', array('Guestbook.type_id' => $_GET['type_id']), 'DESC'); 
   }

    public function admin_index($type_id = 1) {
        $this->set('type_id', $type_id);
    }

    public function admin_add() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {
            $this->Guestbook->create();  
            if ($this->Guestbook->save($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_edit() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {
            $this->request->data['Guestbook']['flag'] = 1;  
            if ($this->Guestbook->save($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true, 'msg' => 'OK'))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_delete() {
        if($this->request->is('post')){
            $this->Guestbook->id = $this->data['id'];
            if ($this->Guestbook->delete()) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            }else{
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }


}
