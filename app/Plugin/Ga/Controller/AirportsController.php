<?php
App::uses('GaAppController', 'Ga.Controller');

class AirportsController extends GaAppController {
    public $name = 'Airports';
    public $uses = array('Ga.Airport', 'Ga.GaDepartment', 'Code', 'Department');

    public function admin_json_data(){
        $_conditions = array('1' => '1');
        $_data = $this->request->data;

        if(!empty($_data['area_id'])){
            $_conditions = array_merge($_conditions, array('Airport.area_id' => $_data['area_id']));
        }
        if(!empty($_data['grade'])){
            $_conditions = array_merge($_conditions, array('Airport.grade' => $_data['grade']));
        }
        if(!empty($_data['type'])){
            $_conditions = array_merge($_conditions, array('Airport.airport_type' => $_data['type']));
        }
        if(!empty($_data['start_date'])){
            $_conditions = array_merge($_conditions, array('Airport.start_date >=' => $_data['start_date']));
        }
        if(!empty($_data['end_date'])){
            $_conditions = array_merge($_conditions, array('Airport.end_date <=' => $_data['end_date']));
        }
        if(!empty($_data['keyword'])){
            $_conditions = array_merge($_conditions, array('Airport.name LIKE' => '%'.$_data['keyword'].'%'));
        }

        $this->findJSON4Grid('id', $_conditions, 'asc'); //
    }

    public function admin_index() {
        $areas = $this->GaDepartment->generateTreeList(array('GaDepartment.hierarchy =' => 2), null, null, '', null);
        $areas = array('' => '-- 请选择 --') + $areas;

        $scopes = $this->Code->generateTreeList(array('Code.category' => 'scope'), null, null, '　', null);
        $scopes = array('' => '-- 请选择 --') + $scopes;

        $regions = $this->GaDepartment->Region->find('list', array('conditions' => "Region.id like '__0000'"));
        $regions = array('' => '-- 请选择 --') + $regions;

        $types = array('' => '-- 请选择 --', 1 => '永久机场', 2 => '临时机场');
        $grades = array('' => '-- 请选择 --', 1 => '一类通用机场（10-29座）', 2 => '二类通用机场（5-9座）', 3 => '三类通用机场');

        $this->set(compact('areas', 'scopes', 'regions', 'types', 'grades'));
    }

    private function _form(){
        $scopes = $this->Code->generateTreeList(array('Code.category' => 'scope'), null, null, '　', null);
        $areas = $this->Department->generateTreeList(array('Department.hierarchy' => 2), null, null, '　', null);
        $this->set(compact('scopes', 'areas'));
    }


    public function admin_add() {
        if (empty($this->request->data)) {
            $this->_form();
        }
    }


    public function admin_save() {
        if (!empty($this->request->data)) {
            $this->Airport->create();

            if ($this->Airport->save($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'XXX'))));
            }
        }
    }

    public function admin_edit($id) {

        $this->Airport->id = $id;

        $this->request->data = $this->Airport->read(null, $id);

        $this->_form();

    }

    public function admin_delete() {
        if($this->request->is('post')){
            $this->Airport->id = $this->data['id'];
            if ($this->Airport->delete()) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            }else{
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }


}
