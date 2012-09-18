<?php
/**
 * UserMeta Model
 *
 */
class UserMeta extends AppModel {
    var $hasOne = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'ID',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    var $belongsTo = array(
        'Role' => array(
            'className' => 'Role',
            'foreignKey' => 'role_id',
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
        ),
        'State' => array(
            'className' => 'Region',
            'foreignKey' => 'state',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'City' => array(
            'className' => 'Region',
            'foreignKey' => 'city',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );	
}
?>
