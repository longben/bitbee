<?php
class ModulesController extends AppController {

    var $name = 'Modules';

    /**
     * 更加条件查询用户JSON数据
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

    public function admin_index2($type) {
        $this->Module->recursive = 0;
        $this->paginate['Module'] = array(
            'conditions' => array('Module.type' => $type) , 
            'recursive' => -1, //int
            'order' => 'Module.lft', //string or array defining order
            'limit' => 15, //int
            'page' => null //int
        );		
        $this->set('modules', $this->paginate());
    }	

    public function admin_website() {
        $this->Module->recursive = 0;
        $this->paginate['Module'] = array(
            'conditions' => array('Module.parent_id' => '302', 'Module.type' => 'website'), 
            'recursive' => -1, //int
            'fields' => array('Module.id', 'Module.name'),
            'order' => 'Module.id', //string or array defining order
            'limit' => 10, //int
            'page' => null //int
        );
        $this->set('modules', $this->paginate());
    }

    public function admin_website_edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('Invalid Module'));
            $this->redirect(array('action'=>'website'));
        }
        if (!empty($this->request->data)) {
            if ($this->Module->save($this->request->data)) {
                $this->Session->setFlash(__('栏目简介保存成功！'));
                $this->redirect(array('action'=>'website'));
            } else {
                $this->Session->setFlash(__('The Module could not be saved. Please, try again.'));
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->Module->read(null, $id);
        }
    }


    public function admin_add() {
        if($this->request->is('post')){
            if (!empty($this->data)) {    
                if ($this->Module->save($this->data)) {
                    return new CakeResponse(array('body' => json_encode(array('success'=>true))));
                } else {
                    return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
                }
            }
        }
        $this->autoRender = false;
    }

    public function admin_edit() {
        if($this->request->is('post')){
            if (!empty($this->request->data)) {    
                if ($this->Module->save($this->request->data)) {
                    return new CakeResponse(array('body' => json_encode(array('success'=>true))));
                } else {
                    return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
                }
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
