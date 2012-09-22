<?php
class Department extends AppModel {

	public $name = 'Department';
    
    public $displayField = 'name';

    public $actsAs = array('Tree');
	
	
	var $belongsTo = array(
			'Region' => array(
				'className' => 'Region',
				'foreignKey' => 'region_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
            ),
 			'Parent' => array('className' => 'Department',
								'foreignKey' => 'parent_id',
								'conditions' => 'Parent.id <> Department.id',
								'fields' => 'Department.id, Department.name',
								'order' => ''
			)
	);
}
?>
