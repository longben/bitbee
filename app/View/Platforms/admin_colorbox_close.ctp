<script type="text/javascript" charset="utf-8">
	$(function() {
		if ( $('#flashMessage').text() != '') {
			$.messager.alert('信息提示', '<font color=black>' + $('#flashMessage').text() + '</font>', 'info',function(){
				//$.colorbox.close();
				parent.location.reload(); //重载当前窗口
			});
			$('#flashMessage').text("");
		}
	});
</script>