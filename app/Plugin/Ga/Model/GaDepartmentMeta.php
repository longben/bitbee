<?php
App::uses('GaAppModel', 'Ga.Model');

class GaDepartmentMeta extends GaAppModel {
    var $hasOne = array(
        'Department' => array(
            'className' => 'Department',
            'foreignKey' => 'id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );


    var $belongsTo = array(
        'Authority' => array(
            'className' => 'Department',
            'foreignKey' => 'issuing_authority',
            'conditions' => '',
            'fields' => 'Authority.id, Authority.name',
            'order' => ''
        ),
        'Area' => array(
            'className' => 'Department',
            'foreignKey' => 'area_id',
            'conditions' => '',
            'fields' => 'Area.id, Area.name',
            'order' => ''
        ),
    );

}
