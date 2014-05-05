<?php
App::uses('GaAppModel', 'Ga.Model');

class CorpAircraft extends GaAppModel {

    public $name = 'CorpAircraft';

    var $hasOne = array(
        'Aircraft' => array(
            'className' => 'Aircraft',
            'foreignKey' => 'id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    var $belongsTo = array(
        'Region' => array(
            'className' => 'Region',
            'foreignKey' => 'area_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Department' => array(
            'className' => 'Department',
            'foreignKey' => 'department_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}
