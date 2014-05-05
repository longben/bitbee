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
        $this->findJSON4Grid('id', null, 'asc'); //
    }


}
