<?php
App::uses('BlogAppController', 'Blog.Controller');
/**
 * Main Controller
 *
 */
class MainController extends BlogAppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Main';

/**
 * Models used by the Controller
 *
 * @var array
 * @access public
 */
	public $uses = array('Menu','User');

	public function index($username) {
        $this->set( 'user', $this->User->read(null, $username) );
	}

}
