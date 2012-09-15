<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->script(array('jquery/jquery-1.8.0.min', 'jquery/easyui/jquery.easyui.min' , 'jquery/easyui/locale/easyui-lang-zh_CN', 'jquery/validation/jquery.validate.min'));
		echo $this->Html->css(array('easyui.generic', 'easyui/themes/default/easyui','easyui/themes/icon'));
		echo $scripts_for_layout;
	?>
	
	<script type="text/javascript">
		$(document).ready(function(){
			
			//表单校验
			$("#bbForm").validate(); 
			
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
