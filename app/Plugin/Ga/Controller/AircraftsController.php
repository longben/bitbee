<?php
App::uses('GaAppController', 'Ga.Controller');

class AircraftsController extends GaAppController {
    public $name = 'Aircrafts';
    public $uses = array('Ga.Aircraft', 'Ga.CorpAircraft', 'Code', 'Region', 'Department');

    /**
     * 根据条件查询用户JSON数据
     *
     * @return JSON
     */
    public function admin_json_data(){
        $this->findJSON4Grid('id', null, 'asc'); //
    }

    public function admin_index() {

    }



    public function admin_add() {
        if (!empty($this->request->data)) {
            $this->Aircraft->create();
            $this->request->data['Corp']['purpose'] = implode(',', $this->request->data['Corp']['purpose']);
            if ($this->Aircraft->saveAll($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }else{
            $departments = $this->Department->find('list',
                array('conditions' => array('Department.hierarchy' => 4))
            );
            $areas = $this->Department->generateTreeList(array('Department.hierarchy' => 2), null, null, '', null);
            $types = $this->Code->generateTreeList(null, null, null, '>>>', null);

            $brands = $this->Code->find('list',array(
                'conditions' => array('Code.category' => 'brand', 'Code.parent_id is NULL')
            ));
            $models = $this->Code->find('list',array(
                'conditions' => array('Code.category' => 'brand', 'Code.parent_id' => key($brands))
            ));

            $this->set(compact('departments', 'areas', 'types', 'brands', 'models'));
        }
    }


    public function admin_save() {
        //$this->autoRender = false;
        if (!empty($this->request->data)) {
            $this->Aircraft->create();

            if(!empty($this->request->data['Corp']['purpose'])){
                $this->request->data['Corp']['purpose'] = implode(',', $this->request->data['Corp']['purpose']);
            }
            if(!empty($this->request->data['Corp']['procure_method'])){
                $this->request->data['Corp']['procure_method'] = implode(',', $this->request->data['Corp']['procure_method']);
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


        $parents = $this->Aircraft->generateTreeList(array('Aircraft.hierarchy <=' => 2), null, null, '..', null);
        $areas = $this->Aircraft->generateTreeList(array('Aircraft.hierarchy =' => 2), null, null, '', null);

        $regions = $this->Aircraft->Region->find('list', array(
            'conditions' => "Region.id like '__0000'"));
        $regions = array('' => '--请选择--') + $regions;
        $cities = $this->Aircraft->Region->find('list', array(
            'conditions' => "Region.id like '51____' and Region.id <> '510000'"));

        $qylb1 = $this->Code->find('list', array(
            'conditions' => array('Code.category' => 'dept_type', 'Code.parent_id' => NULL)
        ));
        $qylb2 = $this->Code->find('list', array(
            'conditions' => array(
                'Code.category' => 'dept_type', 'Code.parent_id' => $this->request->data['Aircraft']['dept_type_id'])
        ));


        $this->set(compact('parents', 'areas', 'regions', 'cities', 'qylb1', 'qylb2'));

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Aircraft->saveAll($this->request->data)) {
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
