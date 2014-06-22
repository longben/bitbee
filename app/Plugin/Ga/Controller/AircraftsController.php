<?php
App::uses('GaAppController', 'Ga.Controller');

class AircraftsController extends GaAppController {
    public $name = 'Aircrafts';
    public $uses = array('Ga.Aircraft', 'Ga.CorpAircraft', 'Code', 'Region', 'Department');


    //For requestAction
    public function getProcureMethod($id=null){
        switch($id) {
        case 1:
            return '购买';
            break;
        case 2:
            return '租赁';
            break;
        case 3:
            return '代管';
            break;
        default:
            return '其他';
        }
    }


    public function getStatus($id = null) {
        switch($id){
        case 1:
            return '运行';
            break;
        case 2:
            return '暂停';
            break;
        default:
            return '终止';
        }
    }

    public function getMaintenance($id = null) {
        switch($id){
        case 1:
            return '难';
            break;
        case 2:
            return '中等';
            break;
        default:
            return '易';
        }
    }

    /**
     * 根据条件查询用户JSON数据
     *
     * @return JSON
     */
    public function admin_json_data(){
        $_conditions = array(1 => 1);
        $_data = $this->request->data;

        if(!empty($_data['area_id'])){
            $_conditions = array_merge($_conditions, array('CorpAircraft.area_id' => $_data['area_id']));
        }
        if(!empty($_data['region_id'])){
            $_conditions = array_merge($_conditions, array('Department.region_id' => $_data['region_id']));
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
            $_conditions = array_merge($_conditions, array('Department.name LIKE' => '%'.$_data['keyword'].'%'));
        }

        $this->findJSON4Grid('id', $_conditions, 'asc'); //
    }

    public function admin_export(){
        $this->admin_json_data();
    }

    public function admin_index() {
        $areas = $this->Department->generateTreeList(array('Department.hierarchy' => 2), null, null, '', null);
        $areas = array('' => '-- 请选择 --') + $areas;
        $procure_methods = array('' => '-- 请选择 --', '1' => '购买', '2' => '租赁', '3' => '代管', '4' => '其他');
        $status = array('' => '-- 请选择 --', '1' => '运行', '2' => '暂停', '3' => '终止');
        $types = $this->Code->generateTreeList(array('Code.category' => 'aircraft_type'), null, null, '　', null);
        $types = array('' => '-- 请选择 --') + $types;

        $this->set(compact('areas', 'types', 'procure_methods', 'status'));
    }

    private function _form(){
        $departments = $this->Department->find('list',array(
            'conditions' => array('Department.hierarchy' => 4))
        );
        $areas = $this->Department->generateTreeList(array('Department.hierarchy' => 2), null, null, '', null);

        $scopes = $this->Code->generateTreeList(array('Code.category' => 'scope'), null, null, '　', null);

        $types = $this->Code->generateTreeList(array('Code.category' => 'aircraft_type'), null, null, '　', null);


        $brands = $this->Code->find('list',array(
            'conditions' => array('Code.category' => 'brand', 'Code.parent_id is NULL')
        ));
        $models = $this->Code->find('list',array(
            'conditions' => array('Code.category' => 'brand', 'Code.parent_id' => key($brands))
        ));

        $procure_methods = array('1' => '购买', '2' => '租赁', '3' => '代管', '4' => '其他');

        $status = array('1' => '运行', '2' => '暂停', '3' => '终止');

        $this->set(compact('departments', 'areas', 'types', 'brands', 'models', 'scopes', 'procure_methods','status'));
    }



    public function admin_add() {
        if (empty($this->request->data)) {
            $this->_form();
        }
    }


    public function admin_save() {
        if (!empty($this->request->data)) {
            $this->Aircraft->create();

            if(!empty($this->request->data['Corp']['purpose'])){
                $this->request->data['Corp']['purpose'] = implode(',', $this->request->data['Corp']['purpose']);
            }
            if(!empty($this->request->data['Corp']['use_task'])){
                $this->request->data['Corp']['use_task'] = implode(',', $this->request->data['Corp']['use_task']);
            }
            if ($this->Aircraft->saveAll($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'XXX'))));
            }
        }
    }

    public function admin_edit($id) {

        $this->Aircraft->id = $id;

        $this->request->data = $this->Aircraft->read(null, $id);

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
