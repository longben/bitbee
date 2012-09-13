<?php
class CkHelper extends AppHelper{
    var $helpers = Array('Html', 'Javascript');

    function load($id,$options_=array()) {
        $options = array(
                    'language'=>'zh-cn',
                    'uiColor'=>'#D2E0F2',
                    'toolbar'=>'TwoLineToolbar',
                    'theme' => 'default',
					'skin' => 'chris',
                   );
        if(!empty($options_)) $options = array_merge($options,$options_);
		
        $did = '';
        foreach (explode('.', $id) as $v) {
            $did .= Inflector::camelize($v);
        }
        $did = Inflector::humanize($did);
        
        $code = " if (CKEDITOR.instances['".$did."']) {
                    CKEDITOR.remove(CKEDITOR.instances['".$did."']);
                    cckeditor".$did.".destroy();
                    cckeditor".$did." = null;
                 }\n";
        $code .= " cckeditor".$did." = CKEDITOR.replace( '".$did."',".$this->Javascript->object($options).");\n";
        
        $code .= " CKFinder.setupCKEditor(cckeditor" . $did . ",'" . $this->base ."/js/ckfinder/'); \n";
       
        return $this->Javascript->codeBlock($code); 
    } 
} 
?>