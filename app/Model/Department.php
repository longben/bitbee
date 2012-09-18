<?php
class Department extends AppModel {
	var $name = 'Department';
	
	var $displayField = 'name';
	
	var $actsAs = array('Tree');
	
/* 	var $validate = array(
		'name' => array(
			'blank' => array(
				'rule' => array('blank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	); */
	
	
	
	var $belongsTo = array(
			'Region' => array(
				'className' => 'Region',
				'foreignKey' => 'region_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			)			
	);
}
?>