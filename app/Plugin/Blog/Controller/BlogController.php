<?php
App::uses('BlogAppController', 'Blog.Controller');
/**
 * Menus Controller
 *
 */
class BlogController extends BlogAppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Blog';

/**
 * Models used by the Controller
 *
 * @var array
 * @access public
 */
	public $uses = array('Menu');

	public function index() {

	}

}
