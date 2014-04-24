<?php
App::uses('GaAppModel', 'Ga.Model');
/**
 * GaDepartmentMeta Model
 *
 */


class GaDepartmentMeta extends GaAppModel {
    var $hasOne = array(
        'GaDepartment' => array(
            'className' => 'GaDepartment',
            'foreignKey' => 'id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}
