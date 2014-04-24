<?php

App::uses('WordpressAuthenticate', 'Controller/Component/Auth');

class User extends AppModel {

    public $displayField = 'display_name';

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

        //$this->data['User']['user_activation_key'] = 51978541 + $user_id .'-'. md5(rand(100000,999999));
        if(isset($this->data['User']['user_pass'])){
            $this->data['User']['user_pass'] = WordpressAuthenticate::password($this->data['User']['user_pass']);
        }
        return true;
    }

    public function update_password($id, $password) {
        return $this->query("update users set user_pass = '". WordpressAuthenticate::password($password) . "' where ID = $id");
    }



}

?>
