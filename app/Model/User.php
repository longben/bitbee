<?php

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
			'Meta' => array('className' => 'UserMeta',
								'foreignKey' => 'id',
								'dependent' => true,
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
        );

    public function beforeSave($options = array()) {
        $this->data['User']['user_pass'] = AuthComponent::password($this->data['User']['user_pass']);
        return true;
    }
        
}

?>
