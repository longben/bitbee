<?php
App::uses('GaAppModel', 'Ga.Model');

class Assignment extends GaAppModel {

    public $name = 'Assignment';

    var $belongsTo = array(
        'Department' => array(
            'className' => 'Department',
            'foreignKey' => 'department_id',
            'conditions' => array('Department.hierarchy' => 4),
            'fields' => 'Department.id, Department.name',
            'order' => ''
        ),
        'Area' => array(
            'className' => 'Department',
            'foreignKey' => 'area_id',
            'conditions' => '',
            'fields' => 'Area.id, Area.name',
            'order' => ''
        )
    );

}
