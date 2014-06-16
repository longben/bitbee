<?php
App::uses('GaAppController', 'Ga.Controller');

class AssignmentsController extends GaAppController {
    public $name = 'Assignments';
    public $uses = array('Ga.Assignment', 'Code', 'Region', 'Department');

    public function admin_json_data(){
        $_conditions = array(1 => 1);
        $_data = $this->request->data;
        if(!empty($_data['area_id'])){
            $_conditions = array_merge($_conditions, array('Assignment.area_id' => $_data['area_id']));
        }
        if(!empty($_data['scope'])){
            $_conditions = array_merge($_conditions, array('Assignment.scope LIKE' => '%'.$_data['scope'].'%'));
        }
        if(!empty($_data['aircraft_type'])){
            $_conditions = array_merge($_conditions, array('Assignment.aircraft_type' => $_data['aircraft_type']));
        }
        if(!empty($_data['start_date'])){
            $_conditions = array_merge($_conditions, array('Assignment.assignment_date >=' => $_data['start_date']));
        }
        if(!empty($_data['end_date'])){
            $_conditions = array_merge($_conditions, array('Assignment.assignment_date <=' => $_data['end_date']));
        }
        if(!empty($_data['keyword'])){
            $_conditions = array_merge($_conditions, array('Department.name LIKE' => '%'.$_data['keyword'].'%'));
        }

        $this->findJSON4Grid('id', $_conditions, 'asc'); //
    }

    public function admin_index() {
        $areas = $this->Department->generateTreeList(array('Department.hierarchy' => 2), null, null, '', null);
        $areas = array('' => '-- 请选择 --') + $areas;
        $scopes = $this->Code->generateTreeList(array('Code.category' => 'scope'), null, null, '　', null);
        $scopes = array('' => '-- 请选择 --') + $scopes;
        $status = array('' => '-- 请选择 --', '1' => '运行', '2' => '暂停', '3' => '终止');
        $types = $this->Code->generateTreeList(array('Code.category' => 'aircraft_type'), null, null, '　', null);
        $types = array('' => '-- 请选择 --') + $types;

        $this->set(compact('areas', 'types', 'scopes', 'status'));
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

        $aircraft_types = $this->Code->generateTreeList(array('Code.category' => 'aircraft_type'), null, null, '　', null);

        $this->set(compact('departments', 'areas', 'types', 'scopes', 'aircraft_types'));
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
                /*
                $this->request->data['Assignment']['assignment_type']
                = implode(',', $this->request->data['Assignment']['assignment_type']);
                 */
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
