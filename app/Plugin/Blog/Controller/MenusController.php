<?php
App::uses('BlogAppController', 'Blog.Controller');
/**
 * Menus Controller
 *
 */
class MenusController extends BlogAppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Menus';

/**
 * Models used by the Controller
 *
 * @var array
 * @access public
 */
	public $uses = array('Menu');

/**
 * Admin index
 *
 * @return void
 * @access public
 */
	public function admin_index() {
		$this->set('title_for_layout', __('Menus'));

		$this->Menu->recursive = 0;
		$this->paginate['Menu']['order'] = 'Menu.id DESC';
		$this->set('menus', $this->paginate());
	}

/**
 * Admin add
 *
 * @return void
 * @access public
 */
	public function admin_add() {
		$this->set('title_for_layout', __('Add Menu'));

		if (!empty($this->request->data)) {
			$this->Menu->create();
			if ($this->Menu->save($this->request->data)) {
				$this->Session->setFlash(__('The Menu has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Menu could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
	}

/**
 * Admin edit
 *
 * @param integer $id
 * @return void
 * @access public
 */
	public function admin_edit($id = null) {
		$this->set('title_for_layout', __('Edit Menu'));

		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Menu'), 'default', array('class' => 'error'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Menu->save($this->request->data)) {
				$this->Session->setFlash(__('The Menu has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Menu could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Menu->read(null, $id);
		}
	}

/**
 * Admin delete
 *
 * @param integer $id
 * @return void
 * @access public
 */
	public function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Menu'), 'default', array('class' => 'error'));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Menu->delete($id)) {
			$this->Session->setFlash(__('Menu deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
	}

}
