<?php
class RolesController extends AppController {

	var $name = 'Roles';

    public function admin_json_data(){
        $this->findJSON4Grid('id',NULL,'ASC'); //
    }

	function admin_tree() {
		$this->layout='platforms';
		if (!$this->Session->check('id')) {
			$this->Session->setFlash(__('非法请求.'));
			$this->redirect(array('controller' => 'platforms', 'action' => 'login'));
		}
		$this->Role->unbindModel( array('hasMany' => array('User')) );
		if($this->Session->read('role') == ROLE_ADMIN && $this->Session->read('id') == MEMBER_ADMIN) {
			$this->redirect(array('controller' => 'Roles', 'action' => 'tree'));
		}else {
			$this->set('role', $this->Role->read(null, $this->Session->read('role')));
		}
	}

	public function admin_index() {

	}

    public function admin_add() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {
            $this->Role->create();  
            if ($this->Role->save($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_edit() {
        $this->autoRender = false;
        if (!empty($this->request->data)) {    
            if ($this->Role->save($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true, 'msg' => 'OK'))));
            } else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

    public function admin_delete() {
        if($this->request->is('post')){
            $this->Role->id = $this->data['id'];
            if ($this->Role->delete()) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
            }else{
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
            }
        }
    }

	function admin_authorization($id = null) {
        //$this->layout = 'blank';
		//Configure::write('debug', 0);
		if (!empty($this->request->data)) {
			if ($this->Role->save($this->request->data)) {
                return new CakeResponse(array('body' => json_encode(array('success'=>true))));
			} else {
                return new CakeResponse(array('body' => json_encode(array('msg'=>'Some errors occured.'))));
			}
		}

        $this->set('role', $this->Role->read(null, $id));

        $this->set('id', $id);

		if (!empty($id)) {
			$modules = $this->Role->Module->find('all');
			$this->set(compact('modules'));
		}
	}

	
    function admin_read($id){
	    $role = $this->Role->read(null, $id);
        return $role['Role']['name'];
    }

}
?>
