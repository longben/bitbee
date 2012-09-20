<?php
class ModulesController extends AppController {

    var $name = 'Modules';


    /**
     * 根据条件查询用户JSON数据
     *
     * @return JSON
     */
    public function admin_json_data(){
        $this->findJSON4Grid('lft'); //
    }

    public function admin_index() {

        $parents = $this->Module->generateTreeList(array('Module.hierarchy' => 1), null, null, '--', null);
        //$parents = $this->Module->generateTreeList(null, null, null, '--');
        $parents = array('' => '无上级栏目') + $parents;

        $moduleImages = array('icon-account'=>'icon-account','icon-agency'=>'icon-agency','icon-download'=>'icon-download',
            'icon-nav'=>'icon-nav','icon-news'=>'icon-news','icon-product'=>'icon-product','icon-role'=>'icon-role',
            'icon-service'=>'icon-service','icon-set'=>'icon-set','icon-sys'=>'icon-sys','icon-users'=>'icon-users');

        $types = array('system' => '系统模块', 'website' => '网站模块');

        $this->set(compact('parents', 'types', 'moduleImages'));

    }


    public function admin_add() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {
            $this->Module->create();  
            if ($this->Module->save($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_edit() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {    
            if ($this->Module->save($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true, 'msg' => 'OK'))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_delete() {
        if($this->request->is('post')){
            $this->Module->id = $this->data['id'];
            if ($this->Module->delete()) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            }else{
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_tree() {
        /*
        if($this->Session->check('id') && $this->Session->read('role') == ROLE_ADMIN) {
            $this->layout='platforms';
            $this->Module->recursive = -1;
            $this->set('modules', $this->Module->find('all'));
        }else {
            $this->Session->setFlash(__('Invalid Administrator'));
            $this->redirect(array('controller' => 'platforms', 'action' => 'login'));
        }
         */
        $this->layout='platforms';
        $this->Module->recursive = -1;
        $this->set('modules', $this->Module->find('all'));

        //$this->set('outlook', $this->Module->generatetreelist( null, null, null, '', null));
    }

}
