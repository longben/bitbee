<?php
App::uses('HyAppController', 'Hy.Controller');

/**
 * App Controller
 *
 */
class ProductsController extends HyAppController {

    public function admin_json_data(){
        $this->findJSON4Grid('id',null, 'asc'); //
    }

	public function admin_index($locale = 'zh') {
		$codes = $this->Product->Code->find('list', array( 'conditions' => array('Code.locale' => $locale) ));
		$this->set(compact('codes'));
	}

    public function admin_add() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {
            $this->Product->create();  
            if ($this->Product->save($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_edit() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {    
            if ($this->Product->save($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true, 'msg' => 'OK'))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_delete() {
        if($this->request->is('post')){
            $this->Product->id = $this->data['id'];
            if ($this->Product->delete()) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            }else{
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }




}
