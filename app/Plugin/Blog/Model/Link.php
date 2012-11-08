<?php
App::uses('BlogAppModel', 'Blog.Model');
/**
 * Link Model
 *
 * @property Menu $Menu
 */
class Link extends BlogAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
    
  
 /**
 * Behaviors used by the Model
 *
 * @var array
 * @access public
 */
	public $actsAs = array(
		'Tree',
		'Cached' => array(
			'prefix' => array(
				'link_',
				'menu_',
			),
		),
	);


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Menu' => array(
			'className' => 'Menu',
			'foreignKey' => 'menu_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
