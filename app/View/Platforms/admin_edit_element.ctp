<?php
echo $javascript->link('ckeditor/ckeditor', NULL, false);
echo $javascript->link('ckfinder/ckfinder', NULL, false);
?>


<?php 
echo $form->create('Platform', array('action' => 'save_element/'.$file_name, 'name' => 'bbForm', 'id' => 'bbForm'));
echo $form->input('content', array('type' => 'textarea', 'label' => '', 'default' => $content));
echo $ck->load('Platform.content');
//echo $form->submit('保存');
echo $form->end();
?>

<script type="text/javascript">
CKEDITOR.on('instanceReady',
    function( evt ){
        var editor = evt.editor;
        editor.execCommand('maximize');
    });
</script>
