<SCRIPT LANGUAGE="JavaScript">
	var iPath = "<?=$this->Html->url('/')?>";
	if(iPath=="/")iPath="";
</SCRIPT>
<?php
  echo $this->Javascript->link(array('dtree'));
?>
<style type="text/css">
<!--
body {
	background-color: #E3F4FE;
}
-->
</style>
<table width="100%" align="center">
<tr>
	<td>
		<div id="dtree">
			<script type="text/javascript">
				<!--
				function changeCloseStatus(){
					var closeSameLevelCheckbox = document.getElementById("closeSameLevelCheckbox");
					if(closeSameLevelCheckbox.checked){
						d.config.closeSameLevel = true;
					}else{
						d.config.closeSameLevel = false;
					}
				}

				d = new dTree('d');
				d.config.target = "frameMain";
				d.config.useCheckBox=false;
				d.config.imageDir = '<?=$this->Html->url('/img/tree')?>';
				d.reSetImagePath();
				d.config.folderLinks = true;
				d.config.closeSameLevel = true;
				d.config.check=false;//显示复选框
				d.config.mycheckboxName="ids";//设置<input type='checkbox' name="ids"/>name的属性
				var isOpen;

				d.add(0,-1,'TEST');

				<?php
				  if (!empty($modules)){
					  foreach ($modules as $module):
						  if('system'==$module['Module']['type']){
						    $url = $module['Module']['url']==''?'':$module['Module']['url'];
					      }else if('website'==$module['Module']['type']){
							$url = $module['Module']['url']==''?'':$module['Module']['url'].'/'.$module['Module']['id'];
						  }else{
							$url = $module['Module']['url']==''?'':$this->Html->url($module['Module']['url']);
						  }
						  if(empty($module['Module']['parent_id'])){
						     $_parent = 0;
						  }else{
						     $_parent = $module['Module']['parent_id'];
						  }
						  echo("d.add(". $module['Module']['id']. ",". $_parent . ",'" . $module['Module']['name'] . "','" . $url . "');\n");
					  endforeach;
				  }
				?>
				//d.add(1111, 0, 'My node', 'node.html', 'node title', 'mainframe', '/img/tree/globe.gif');

				document.write(d);
				d.closeAll();

				//d.setCheck("1,11"); //设置默认选中的项目

				//-->
			</script>
		</div>
	</td>
</tr>
</table>