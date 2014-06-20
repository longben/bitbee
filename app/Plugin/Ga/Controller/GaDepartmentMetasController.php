<?php
App::uses('GaAppController', 'Ga.Controller');
/**
 * GaDepartmentMetas Controller
 *
 */
class GaDepartmentMetasController extends GaAppController {
    public $name = 'GaDepartmentMetas';
    public $uses = array('Ga.GaDepartmentMeta','Department', 'Region');

    public function admin_json_data(){
        $_conditions = array('Department.hierarchy' => 4);
        $_data = $this->request->data;

        if(!empty($_data['area_id'])){
            $_conditions = array_merge($_conditions, array('GaDepartmentMeta.area_id' => $_data['area_id']));
        }
        if(!empty($_data['region_id'])){
            $_conditions = array_merge($_conditions, array('Department.region_id' => $_data['region_id']));
        }
        if(!empty($_data['scope'])){
            $_conditions = array_merge($_conditions, array('GaDepartmentMeta.scope LIKE' => '%'.$_data['scope'].'%'));
        }
        if(!empty($_data['start_date'])){
            $_conditions = array_merge($_conditions, array('GaDepartmentMeta.start_date >=' => $_data['start_date']));
        }
        if(!empty($_data['end_date'])){
            $_conditions = array_merge($_conditions, array('GaDepartmentMeta.end_date <=' => $_data['end_date']));
        }
        if(!empty($_data['keyword'])){
            $_conditions = array_merge($_conditions, array('Department.name LIKE' => '%'.$_data['keyword'].'%'));
        }

        $this->findJSON4Grid('id', $_conditions, 'asc'); //
    }

    public function admin_export(){
        $this->admin_json_data();
    }

    public function findRegion($id){
        $data = $this->Region->read(null, $id);
        return $data['Region']['name'];
    }

}
