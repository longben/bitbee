<?php
App::uses('GaAppModel', 'Ga.Model');

class Aircraft extends GaAppModel {

    public $name = 'Aircraft';

    public $displayField = 'name';

    public $actsAs = array('Tree');

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
