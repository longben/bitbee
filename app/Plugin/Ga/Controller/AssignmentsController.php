<?php
App::uses('GaAppController', 'Ga.Controller');

class AssignmentsController extends GaAppController {
    public $name = 'Assignments';
    public $uses = array('Ga.Assignment', 'Code', 'Region', 'Department');

    public function admin_json_data(){
        $this->findJSON4Grid('id', null, 'asc'); //
    }

    public function admin_index() {

    }

    private function _form(){
        $departments = $this->Department->find('list',array(
            'conditions' => array('Department.hierarchy' => 4))
        );

        $areas = $this->Department->generateTreeList(array('Department.hierarchy' => 2), null, null, '', null);
        $scopes = $this->Code->generateTreeList(array('Code.category' => 'scope'), null, null, '　', null);

        $types = $this->Code->find('list',array(
            'conditions' => array('Code.category' => 'brand', 'Code.parent_id is NULL')
        ));

        $this->set(compact('departments', 'areas', 'types', 'scopes'));
    }



    public function admin_add() {
        if (empty($this->request->data)) {
            $this->_form();
        }
    }


    public function admin_save() {
        if (!empty($this->request->data)) {
            $this->Assignment->create();

            if(!empty($this->request->data['Assignment']['assignment_type'])){
                $this->request->data['Assignment']['assignment_type']
                    = implode(',', $this->request->data['Assignment']['assignment_type']);
            }
            if ($this->Assignment->saveAll($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'XXX'))));
            }
        }
    }

    public function admin_edit($id) {

        $this->Assignment->id = $id;

        $this->request->data = $this->Assignment->read(null, $id);

        $this->_form();

    }

    public function admin_delete() {
        if($this->request->is('post')){
            $this->Assignment->id = $this->data['id'];
            if ($this->Assignment->delete()) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            }else{
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }


}
