<?php
App::uses('GaAppModel', 'Ga.Model');

class GaDepartment extends GaAppModel {

    public $name = 'GaDepartment';

    public $useTable = 'departments';

    public $displayField = 'name';

    public $actsAs = array('Tree');

    public $virtualFields = array('_parentId' => 'GaDepartment.parent_id');


    var $hasOne = array(
        'Meta' => array(
            'className' => 'GaDepartmentMeta',
            'foreignKey' => 'id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    var $belongsTo = array(
        'Region' => array(
            'className' => 'Region',
            'foreignKey' => 'region_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Parent' => array(
            'className' => 'GaDepartment',
            'foreignKey' => 'parent_id',
            'conditions' => 'Parent.id <> GaDepartment.id',
            'fields' => 'GaDepartment.id, GaDepartment.name',
            'order' => ''
        )
    );

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
}
