<script type="text/javascript">
	var iPath = "<?=$html->url('/')?>";
	if(iPath=="/")iPath="";

	function addTab(subtitle,url,icon){
		
		$('#tabs').tabs('close','元素维护');
  		if(!$('#tabs').tabs('exists','元素维护')){
			$('#tabs').tabs('add',{
				title:'元素维护',
				content:createFrame(url),
				closable:false,
				icon:icon
			});
		}else{
			$('#tabs').tabs('select',subtitle);
			$('#mm-tabupdate').click();
		}
		
	}

	function createFrame(url) {
		var s = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
		return s;
	}
</script>

<div region="west" split="true" title="元素维护" style="width:200px;padding:10px;color:black">
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
				//d.config.target = "frameMain";
				d.config.useCheckBox=false;
				d.config.imageDir = '<?=$html->url('/img/tree')?>';
				d.reSetImagePath();
				d.config.folderLinks = true;
				d.config.closeSameLevel = true;
				d.config.check=false;//显示复选框
				d.config.mycheckboxName="ids";//设置<input type='checkbox' name="ids"/>name的属性
				var isOpen;

				d.add(0,-1,'元素维护');

				<?php
				  if (!empty($files)){
					$i = 1;
					foreach ($files as $f){
						$url = "";
						$url = "javascript:addTab(\'". basename($f) ."\',\'". $html->url('/admin/platforms/edit_element/').basename($f)."\',\'icon\');";
						$_parent = 0;					
						echo("d.add(". $i. ",". $_parent . ",'" . basename($f) . "','" . $url . "');\n");
						$i++;
					};
				  }
				?>

				//document.write(d);			
				var dtree_div=document.getElementById("dtree");
                dtree_div.innerHTML=d;
				d.closeAll();

				//-->
			</script>
		</div>

</div>

<div region="center">
	<div id="tabs" class="easyui-tabs"  fit="true" border="false" >
		<div title="元素维护" closable="true"  cache="false" style="padding:0px;overflow:hidden; color:red; " >
		   <?php print_r($files);?>
		</div>
	</div>
</div>
