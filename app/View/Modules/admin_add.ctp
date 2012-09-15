<div class="modules form">
<?php echo $this->Form->create('Module');?>
	<fieldset>
 		<legend><?php echo __('Add Module');?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('type');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('module_image');
		echo $this->Form->input('url');
		echo $this->Form->submit('Submit');
	?>
	</fieldset>
<?php echo $this->Form->end();?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('返回模块列表'), array('action'=>'index'));?></li>
	</ul>
</div>
