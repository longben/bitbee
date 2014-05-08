<?php
App::uses('GaAppController', 'Ga.Controller');

class GaDepartmentsController extends GaAppController {
    public $name = 'GaDepartments';
    public $uses = array('Ga.GaDepartment','Code');


    private function _form(){
        $parents = $this->GaDepartment->generateTreeList(array('GaDepartment.hierarchy <=' => 2), null, null, '..', null);
        $areas = $this->GaDepartment->generateTreeList(array('GaDepartment.hierarchy =' => 2), null, null, '', null);

        $scopes = $this->Code->generateTreeList(array('Code.category' => 'scope'), null, null, '　', null);

        $regions = $this->GaDepartment->Region->find('list', array(
            'conditions' => "Region.id like '__0000'"));

        $cities = $this->GaDepartment->Region->find('list', array(
            'conditions' => "Region.id like '11____' and Region.id <> '110000'"));

        $qylb1 = $this->Code->find('list', array(
            'conditions' => array('Code.category' => 'dept_type', 'Code.parent_id' => NULL)
        ));

        $qylb2 = $this->Code->find('list', array(
            'conditions' => array('Code.category' => 'dept_type', 'Code.parent_id' => key($qylb1))
        ));

        $this->set(compact('parents', 'areas', 'regions', 'cities', 'qylb1', 'qylb2','scopes'));
    }



    public function admin_json_data(){
        $_conditions = array('GaDepartment.hierarchy' => 4);
        $_data = $this->request->data;

        if(!empty($_data['area_id'])){
            $_conditions = array_merge($_conditions, array('Meta.area_id' => $_data['area_id']));
        }
        if(!empty($_data['region_id'])){
            $_conditions = array_merge($_conditions, array('GaDepartment.region_id' => $_data['region_id']));
        }
        if(!empty($_data['scope'])){
            $_conditions = array_merge($_conditions, array('Meta.scope LIKE' => '%'.$_data['scope'].'%'));
        }
        if(!empty($_data['start_date'])){
            $_conditions = array_merge($_conditions, array('Meta.start_date >=' => $_data['start_date']));
        }
        if(!empty($_data['end_date'])){
            $_conditions = array_merge($_conditions, array('Meta.end_date <=' => $_data['end_date']));
        }
        if(!empty($_data['keyword'])){
            $_conditions = array_merge($_conditions, array('GaDepartment.name LIKE' => '%'.$_data['keyword'].'%'));
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

        $status = array('' => '-- 请选择 --', 1 => '运行', 2 => '筹建', 3 => '注销筹建', 4 => '注销经营许可');

        $this->set(compact('areas', 'scopes', 'regions', 'status'));
    }

    public function admin_export(){

    }


    public function admin_add() {
        $this->_form();
    }


    public function admin_save() {
        $this->autoRender = false;
        //if ($this->request->is('post') || $this->request->is('put')) {
        if (!empty($this->request->data)) {
            $this->GaDepartment->create();

            if(!empty($this->request->data['Meta']['scope'])){
                $this->request->data['Meta']['scope'] = implode(',', $this->request->data['Meta']['scope']);
            }
            if ($this->GaDepartment->saveAll($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_edit($id) {

        $this->GaDepartment->id = $id;
        $this->request->data = $this->GaDepartment->read(null, $id);

        $this->_form();

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
