<?php
App::uses('GaAppModel', 'Ga.Model');

class Aircraft extends GaAppModel {

    public $name = 'Aircraft';

    //public $displayField = 'name';

    var $hasOne = array(
        'Corp' => array(
            'className' => 'CorpAircraft',
            'foreignKey' => 'aircraft_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );


    var $belongsTo = array(
        'Brand' => array(
            'className' => 'Code',
            'foreignKey' => 'brand',
            'conditions' => array('Brand.category' => 'dept_type'),
            'fields' => 'Brand.id, Brand.name',
            'order' => ''
        )
    );


    /*
    function beforeSave( $options = array() ) {
        if (empty($this->data[$this->alias]['id'])) {
            if($this->data[$this->alias]['parent_id'] == 1000000000){
                $this->data[$this->alias]['parent_id'] = $this->data['Meta']['area_id'];
            }
            $my = $this->getMyId($this->alias, $this->data[$this->alias]['parent_id'], 2);
            $this->data[$this->alias]['id'] = $my['id'];
            if(empty($this->data[$this->alias]['hierarchy'])){ //if hierarchy is empty
                $this->data[$this->alias]['hierarchy'] = $my['hierarchy'];
            }
        }
        return true;
    }
     */
}
