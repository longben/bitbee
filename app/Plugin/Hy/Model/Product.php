<?php
App::uses('HyAppModel', 'Hy.Model');
/**
 * Product Model
 *
 * @property Code $Code
 */
class Product extends HyAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Code' => array(
			'className' => 'Code',
			'foreignKey' => 'code_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
