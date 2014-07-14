<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
  <meta charset="utf-8">
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
    echo $this->Html->script(array(
        'jquery/jquery-1.8.0.min',
        'jquery/jquery.metadata',
        'jquery/easyui/jquery.easyui.min' ,
        'jquery/easyui/locale/easyui-lang-zh_CN',
        'formee/formee',
        'public.js?version=1.0.2'
    ));
    echo $scripts_for_layout;

    echo $this->Html->css(array(
        'default',
        'test',
        'easyui/themes/bitbee/easyui',
        'easyui/themes/icon',
        //'formee/formee-style',
        //'formee/formee-structure'
    ));
	?>

	<script type="text/javascript">
        var WEB_SESSION_ID = '<?=session_id()?>';
		$(document).ready(function(){

			//表单校验
			//$("#bbForm").validate();

			//表单日期格式化
			/*
			$('#dd').datebox({
				formatter: function(date){ return date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate(); },
				parser: function(date){ return new Date(Date.parse(date.replace(/-/g,"/"))); }
			});
			*/

			//信息提示显示
			if ( $('#flashMessage').text() != '') {
				$.messager.alert('信息提示','<font color=blue>' + $('#flashMessage').text() + '</font>','info');
				$('#flashMessage').text("");
			}
		});
	</script>
</head>
<body>
	<div id="container">
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
