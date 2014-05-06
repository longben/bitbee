<?php
App::uses('AppController', 'Controller');
/**
 * Codes Controller
 *
 * @property Code $Code
 */
class CodesController extends AppController {


    function children(){
        $this->RequestHandler->isXml();
        $params = array(
            'conditions' => array(
                'Code.parent_id' => $this->data['parent_id']),
                'order' => 'Code.id'
        );
        $this->set('children', $this->Code->find('all', $params));
        $this->set('_serialize', array('children'));
    }

    /**
     * 根据条件查询用户JSON数据
     *
     * @return JSON
     */
    public function admin_json_data(){
        if(empty($this->params['url']['type'])){
            $this->findJSON4Grid('id',null, 'asc'); //
        }else{
            $this->findJSON4Grid('id',array('Code.category' => $this->params['url']['type']), 'asc'); //
        }
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index($category = null) {
        if(empty($category)){
            $parents = $this->Code->generateTreeList(null, null, null, '--', null);
        }else{
            $parents = $this->Code->generateTreeList(array('Code.category' => $category), null, null, '--', null);
        }
        $parents = array('' => '无父系ID') + $parents;

        $this->set(compact('parents', 'category'));

    }


    public function admin_add() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {
            $this->Code->create();
            if ($this->Code->save($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_edit() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {
            if ($this->Code->save($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true, 'msg' => 'OK'))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_delete() {
        if($this->request->is('post')){
            $this->Code->id = $this->data['id'];
            if ($this->Code->delete()) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            }else{
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }


}
