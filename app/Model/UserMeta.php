<?php
/**
 * UserMeta Model
 *
 */
class UserMeta extends AppModel {
    var $hasOne = array(
        'User' => array('className' => 'User',
        'foreignKey' => 'ID',
        'dependent' => false,
        'conditions' => '',
        'fields' => '',
        'order' => ''
    )
);
}
?>
