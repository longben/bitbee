<?php
App::uses('GaAppController', 'Ga.Controller');

class CorpAircraftsController extends GaAppController {
    public $name = 'CorpAircrafts';
    public $uses = array('Ga.CorpAircraft', 'Ga.Aircraft', 'Code', 'Region');

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
        if(!empty($_data['type'])){
            $_conditions = array_merge($_conditions, array('Aircraft.type' => $_data['type']));
        }
        if(!empty($_data['status'])){
            $_conditions = array_merge($_conditions, array('CorpAircraft.status' => $_data['status']));
        }
        if(!empty($_data['procure_method'])){
            $_conditions = array_merge($_conditions, array('CorpAircraft.procure_method' => $_data['procure_method']));
        }
        if(!empty($_data['r_start_date'])){
            $_conditions = array_merge($_conditions, array('CorpAircraft.register_date >=' => $_data['r_start_date']));
        }
        if(!empty($_data['r_end_date'])){
            $_conditions = array_merge($_conditions, array('CorpAircraft.register_date <=' => $_data['r_end_date']));
        }
        if(!empty($_data['p_start_date'])){
            $_conditions = array_merge($_conditions, array('CorpAircraft.procure_date >=' => $_data['p_start_date']));
        }
        if(!empty($_data['p_end_date'])){
            $_conditions = array_merge($_conditions, array('CorpAircraft.procure_date <=' => $_data['p_end_date']));
        }
        if(!empty($_data['keyword'])){
            $_conditions = array_merge($_conditions, array('Department.name LIKE' => '%'.$_data['keyword'].'%'));
        }

        $this->findJSON4Grid('id', $_conditions, 'asc'); //
    }


}
