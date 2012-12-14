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

	public function admin_index() {
		$codes = $this->Product->Code->find('list');
		$this->set(compact('codes'));
	}


}
