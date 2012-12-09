<?php
class Code extends AppModel {
	public $name = 'Code';
    
    public $actsAs = array('Tree');

	public $displayField = 'name';

    function beforeSave($created) {

        if(isset($this->data['Code']['file']) && !empty($this->data['Code']['file'])){
            extract($this->data['Code']['file']);
            if ($size > 0 && !$error) {

                App::import('Vendor', '/utils/file');

                $_new_filename = md5(time().$name).'.'.getFileExtension($name);
                $_tmp_filename = md5(md5(time().$name)).'.'.getFileExtension($name);

                $uploadfile = UPLOAD_PATH. 'images'. DS . $_new_filename;

                move_uploaded_file($tmp_name, $uploadfile);

                $this->data['Code']['icon'] = $_new_filename;
            }else{

            }
        }

        return true;
    }


}
?>
