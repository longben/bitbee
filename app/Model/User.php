<?php
/**
 * User Model
 *
 */
class User extends AppModel {
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'ID';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'user_nicename';
    
	var $hasOne = array(
			'Member' => array('className' => 'Member',
								'foreignKey' => 'id',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Meta' => array('className' => 'UserMeta',
								'foreignKey' => 'id',
								'dependent' => true,
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
        );
}

?>
