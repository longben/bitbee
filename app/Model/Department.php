<?php
class Department extends AppModel {

    public $name = 'Department';

    public $displayField = 'name';

    public $actsAs = array('Tree');

    public $virtualFields = array('_parentId' => 'Department.parent_id');

    var $belongsTo = array(
        'Region' => array(
            'className' => 'Region',
            'foreignKey' => 'region_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Parent' => array('className' => 'Department',
        'foreignKey' => 'parent_id',
        'conditions' => 'Parent.id <> Department.id',
        'fields' => 'Department.id, Department.name',
        'order' => ''
       )
    );

    function beforeSave( $options = array() ) {
        if (empty($this->data[$this->alias]['id'])) {
            $my = $this->getMyId($this->alias, $this->data[$this->alias]['parent_id']);
            $this->data[$this->alias]['id'] = $my['id'];
            $this->data[$this->alias]['hierarchy'] = $my['hierarchy'];
        }
        return true;
    }
}
