<?php
class RolesController extends AppController {

	var $name = 'Roles';
	var $helpers = array('Html', 'Form', 'Javascript');

	function admin_tree() {
		$this->layout='platforms';
		if (!$this->Session->check('id')) {
			$this->Session->setFlash(__('非法请求.'));
			$this->redirect(array('controller' => 'platforms', 'action' => 'login'));
		}
		$this->Role->unbindModel( array('hasMany' => array('User')) );
		if($this->Session->read('role') == ROLE_ADMIN && $this->Session->read('id') == MEMBER_ADMIN) {
			$this->redirect(array('controller' => 'modules', 'action' => 'tree'));
		}else {
			$this->set('role', $this->Role->read(null, $this->Session->read('role')));
		}
	}


	function admin_index() {
		$this->Role->recursive = 0;
		$this->set('roles', $this->paginate(array('Role.id <>' => 0)));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Role.'));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('role', $this->Role->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Role->create();
			if ($this->Role->save($this->data)) {
				$this->Session->setFlash(__('角色保存成功！'));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Role could not be saved. Please, try again.'));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Role'));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Role->save($this->data)) {
				$this->Session->setFlash(__('角色保存成功！'));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Role could not be saved. Please, try again.'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Role->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Role'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Role->del($id)) {
			$this->Session->setFlash(__('Role deleted'));
			$this->redirect(array('action'=>'index'));
		}
	}

	function admin_authorization($id = null) {
		//Configure::write('debug', 0);
		if (!empty($this->data)) {
			if ($this->Role->save($this->data)) {
				$this->Session->setFlash(__('角色权限设置成功！'));
				$this->set('close_colorbox','OK');
			} else {
				$this->Session->setFlash(__('角色权限设置失败'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Role->read(null, $id);
		}
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