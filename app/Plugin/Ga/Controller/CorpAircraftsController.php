<?php
App::uses('GaAppController', 'Ga.Controller');

class CorpAircraftsController extends GaAppController {
    public $name = 'CorpAircrafts';
    public $uses = array('Ga.Aircraft', 'Ga.CorpAircraft', 'Code', 'Region');

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
            $this->Aricraft->create();
            $this->request->data['Aricraft']['hierarchy'] = 4; //企业的级别统一为4
            $this->request->data['Meta']['scope'] = implode(',', $this->request->data['Meta']['scope']);
            if ($this->Aricraft->saveAll($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }else{
            /*
            $regions = $this->CorpAricraft->Region->find('list', array(
                'conditions' => "Region.id like '__0000'"));
            $this->set(compact('regions'));
             */
        }
    }


    public function admin_save() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {
            $this->Aricraft->create();

            if(!empty($this->request->data['Meta']['scope'])){
                $this->request->data['Meta']['scope'] = implode(',', $this->request->data['Meta']['scope']);
            }
            if ($this->Aricraft->saveAll($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_edit($id) {

        $this->Aricraft->id = $id;

        $this->request->data = $this->Aricraft->read(null, $id);


        $parents = $this->Aricraft->generateTreeList(array('Aricraft.hierarchy <=' => 2), null, null, '..', null);
        $areas = $this->Aricraft->generateTreeList(array('Aricraft.hierarchy =' => 2), null, null, '', null);

        $regions = $this->Aricraft->Region->find('list', array(
            'conditions' => "Region.id like '__0000'"));
        $regions = array('' => '--请选择--') + $regions;
        $cities = $this->Aricraft->Region->find('list', array(
            'conditions' => "Region.id like '51____' and Region.id <> '510000'"));

        $qylb1 = $this->Code->find('list', array(
            'conditions' => array('Code.category' => 'dept_type', 'Code.parent_id' => NULL)
        ));
        $qylb2 = $this->Code->find('list', array(
            'conditions' => array(
                'Code.category' => 'dept_type', 'Code.parent_id' => $this->request->data['Aricraft']['dept_type_id'])
        ));


        $this->set(compact('parents', 'areas', 'regions', 'cities', 'qylb1', 'qylb2'));

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Aricraft->saveAll($this->request->data)) {
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
