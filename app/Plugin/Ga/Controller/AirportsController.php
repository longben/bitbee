<?php
App::uses('GaAppController', 'Ga.Controller');

class AirportsController extends GaAppController {
    public $name = 'Airports';
    public $uses = array('Ga.Airport', 'Code', 'Department');

    public function admin_json_data(){
        $this->findJSON4Grid('id', null, 'asc'); //
    }

    public function admin_index() {

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
