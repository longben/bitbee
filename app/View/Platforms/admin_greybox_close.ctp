<?php
  $javascript->link(array('greybox/AJS', 'greybox/AJS_fx', 'greybox/gb_scripts'), false);
?>
<script type="text/javascript">
    parent.parent.GB_hide(); //关闭当前弹出层
	parent.parent.location.reload(); //重载当前窗口
</script>
