<?php
/**
 * Attachment Model
 *
 */
class Attachment extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

    function beforeSave($created) {

        if(isset($this->data['Attachment']['file']) && !empty($this->data['Attachment']['file'])){
            extract($this->data['Attachment']['file']);
            if ($size > 0 && !$error) {

                App::import('Vendor', '/utils/file');

                $_new_filename = md5(time().$name).'.'.getFileExtension($name);
                $_tmp_filename = md5(md5(time().$name)).'.'.getFileExtension($name);

                $uploadfile = UPLOAD_PATH. 'images'. DS . $_new_filename;

                move_uploaded_file($tmp_name, $uploadfile);

                $this->data['Attachment']['file_path'] = $_new_filename;
            }else{

            }
        }

        return true;
    }


}
