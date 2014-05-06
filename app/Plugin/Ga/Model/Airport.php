<?php
App::uses('GaAppModel', 'Ga.Model');

class Airport extends GaAppModel {

    public $name = 'Airport';

    var $belongsTo = array(
        'Area' => array(
            'className' => 'Department',
            'foreignKey' => 'area_id',
            //'conditions' => array('Area.category' => 'dept_type'),
            'fields' => 'Area.id, Area.name',
            'order' => ''
        )
    );

}
