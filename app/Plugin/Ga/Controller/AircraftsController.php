<?php
App::uses('GaAppController', 'Ga.Controller');

class AircraftsController extends GaAppController {
    public $name = 'Aircrafts';
    public $uses = array('Ga.Aircraft','Code');

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
            $this->GaDepartment->create();
            $this->request->data['GaDepartment']['hierarchy'] = 4; //企业的级别统一为4
            $this->request->data['Meta']['scope'] = implode(',', $this->request->data['Meta']['scope']);
            if ($this->GaDepartment->saveAll($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }else{
            $regions = $this->GaDepartment->Region->find('list', array(
                'conditions' => "Region.id like '__0000'"));

            $cities = $this->GaDepartment->Region->find('list', array(
                'conditions' => "Region.id like '11____' and Region.id <> '110000'"));

            $qylb1 = $this->Code->find('list', array(
                'conditions' => array('Code.category' => 'dept_type', 'Code.parent_id' => NULL)
            ));

            $qylb2 = $this->Code->find('list', array(
                'conditions' => array('Code.category' => 'dept_type', 'Code.parent_id NOT' => NULL)
            ));
            $this->set(compact('parents', 'areas', 'regions', 'cities', 'qylb1', 'qylb2'));
        }
    }


    public function admin_save() {
        $this->autoRender = false;
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


        $parents = $this->GaDepartment->generateTreeList(array('GaDepartment.hierarchy <=' => 2), null, null, '..', null);
        $areas = $this->GaDepartment->generateTreeList(array('GaDepartment.hierarchy =' => 2), null, null, '', null);

        $regions = $this->GaDepartment->Region->find('list', array(
            'conditions' => "Region.id like '__0000'"));
        $regions = array('' => '--请选择--') + $regions;
        $cities = $this->GaDepartment->Region->find('list', array(
            'conditions' => "Region.id like '51____' and Region.id <> '510000'"));

        $qylb1 = $this->Code->find('list', array(
            'conditions' => array('Code.category' => 'dept_type', 'Code.parent_id' => NULL)
        ));
        $qylb2 = $this->Code->find('list', array(
            'conditions' => array(
                'Code.category' => 'dept_type', 'Code.parent_id' => $this->request->data['GaDepartment']['dept_type_id'])
        ));


        $this->set(compact('parents', 'areas', 'regions', 'cities', 'qylb1', 'qylb2'));

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->GaDepartment->saveAll($this->request->data)) {
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
