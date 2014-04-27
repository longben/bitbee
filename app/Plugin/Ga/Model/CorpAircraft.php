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
        'Department' => array(
            'className' => 'GaDepartment',
            'foreignKey' => 'dependent_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

