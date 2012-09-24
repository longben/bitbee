<script charset="utf-8" src="/js/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/js/kindeditor/lang/zh_CN.js"></script>

<?php 
echo $this->Form->create('Platform', array('action' => 'save_element/'.$file_name, 'name' => 'bbForm', 'id' => 'bbForm'));
echo $this->Form->input('content', array('type' => 'textarea', 'label' => '', 'default' => $content));
//echo $this->Form->submit('保存');
echo $this->Form->end();
?>

<script type="text/javascript">
    var editor = KindEditor.create('textarea[id="PlatformContent"]', {uploadJson: '/platforms/upload.json?u=<?=$this->Session->read('id')?>',allowFileManager : true});

</script>
