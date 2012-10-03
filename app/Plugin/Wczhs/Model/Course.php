<?php
App::uses('WczhsAppModel', 'Wczhs.Model');
/**
 * Course Model
 *
 * @property CourseMembership $CourseMembership
 */
class Course extends WczhsAppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'CourseMembership' => array(
			'className' => 'CourseMembership',
			'foreignKey' => 'course_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
