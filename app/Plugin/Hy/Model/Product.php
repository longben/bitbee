<?php
App::uses('HyAppModel', 'Hy.Model');
/**
 * Product Model
 *
 * @property Code $Code
 */
class Product extends HyAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Code' => array(
			'className' => 'Code',
			'foreignKey' => 'code_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


    function beforeSave($created) {

        if(isset($this->data['Product']['file']) && !empty($this->data['Product']['file'])){
            extract($this->data['Product']['file']);
            if ($size > 0 && !$error) {

                App::import('Vendor', '/utils/file');

                $_new_filename = md5(time().$name).'.'.getFileExtension($name);
                $_tmp_filename = md5(md5(time().$name)).'.'.getFileExtension($name);

                $uploadfile = UPLOAD_PATH. 'products'. DS . $_new_filename;

                move_uploaded_file($tmp_name, $uploadfile);

                $this->data['Product']['picture'] = $_new_filename;
            }else{

            }
        }

        return true;
    }


}
