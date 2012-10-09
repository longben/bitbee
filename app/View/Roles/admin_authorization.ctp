<?php  echo $this->Html->script(array('tree/dtree'), array('inline' => false));?>

<?php echo $this->Form->create('Role', array('url' => $this->here,'id' => 'bbForm'));?>
<?php echo $this->Form->input('id', array('value' => $id));?>
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
		d.config.useCheckBox=true;
		d.config.imageDir = '<?=$this->Html->url('/img/tree')?>';
		d.reSetImagePath();
		d.config.folderLinks = false;
		d.config.closeSameLevel = false;
		d.config.check=true;//显示复选框
		d.config.mycheckboxName="data[Module][Module][]";//设置<input type='checkbox' name="ids"/>name的属性
		var isOpen;

		d.add(0,-1,'<?php echo Configure::read('Site.title');?>');
		<?php
		  if (!empty($modules)){
			  foreach ($modules as $m):
				  $url = $m['Module']['url']==''?'':$m['Module']['url'];
				  $url = '';
				  if(empty($m['Module']['parent_id'])){
					 $_parent = 0;
				  }else{
					 $_parent = $m['Module']['parent_id'];
				  }				  
				  echo("d.add(". $m['Module']['id']. ",". $_parent . ",'" . $m['Module']['name'] . "','" . $url . "');\n");
			  endforeach;
		  }
		?>
		document.write(d);
		d.openAll();
		<?php
		  $setCheck = '';
		  foreach($role['Module'] as $module) {
			  $setCheck .= $module['id'].',';
		  }
		?>
		d.setCheck("<?=$setCheck?>"); //设置默认选中的项目
		//-->
	</script>
</div>
<?php echo $this->Form->end();?>
