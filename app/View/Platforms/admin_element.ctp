<script charset="utf-8" src="/js/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/js/kindeditor/lang/zh_CN.js"></script>

<style>
.ke-icon-save {
        background-image: url(/img/save.png);
        width: 48px;
        height: 48px;
}
</style>

<?php 
echo $this->Form->create('Platform', array('action' => 'save_element', 'name' => 'bbForm', 'id' => 'bbForm'));
echo $this->Form->input('content', array('type' => 'textarea', 'label' => '', 'default' => $content, 'style' => 'width:100%;height:300px;'));
echo $this->Form->hidden('file_name', array('value' => $file_name));
//echo $this->Form->submit('保存');
echo $this->Form->end();
?>

<script type="text/javascript">
KindEditor.lang({
        save : '保存'
});

    var editor = KindEditor.create('textarea[id="PlatformContent"]', {uploadJson: '/platforms/upload.json?u=<?=$this->Session->read('id')?>',allowFileManager : true, fullscreenMode:true, save:'保存',items:['source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste','plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright','justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript','superscript', 'clearhtml', 'quickformat', 'selectall', '/','formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold','italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage','flash','media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak','anchor', 'link', 'unlink','/', 'save']});
    //editor.fullscreen();
</script>
