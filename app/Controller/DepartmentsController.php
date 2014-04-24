<?php
class DepartmentsController extends AppController {

    public $name = 'Departments';

    /**
     * 根据条件查询用户JSON数据
     *
     * @return JSON
     */
    public function admin_json_data(){
        $this->findJSON4Grid('id',array('Department.hierarchy <=' => 3), 'asc'); //
    }

    public function admin_index() {

        $parents = $this->Department->generateTreeList(array('Department.hierarchy <=' => 2), null, null, '--', null);
        //$parents = array('' => '无上级部门') + $parents;

        $this->set(compact('parents'));

    }


    public function admin_add() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {
            $this->Department->create();

            //$my = $this->Department->getMyId('Department', $this->request->data['Department']['parent_id']);
            //$this->request->data['Department']['id'] = $my['id'];
            //$this->request->data['Department']['hierarchy'] = $my['hierarchy'];

            if ($this->Department->save($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_edit() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {
            if ($this->Department->save($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true, 'msg' => 'OK'))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_delete() {
        if($this->request->is('post')){
            $this->Department->id = $this->data['id'];
            if ($this->Department->delete()) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            }else{
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }


}
