<div class="modules form">
<?php echo $this->Form->create('Module');?>
	<fieldset>
 		<legend><?php echo __('Edit Module');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('type');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('node');
		echo $this->Form->input('module_image');
		echo $this->Form->input('url');
		echo $this->Form->input('flag');
		echo $this->Form->submit('Submit');
	?>
	</fieldset>
<?php echo $this->Form->end();?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete'), array('action'=>'delete', $this->Form->value('Module.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Module.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Modules'), array('action'=>'index'));?></li>
		<li><?php echo $this->Html->link(__('List Modules'), array('controller'=> 'modules', 'action'=>'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent'), array('controller'=> 'modules', 'action'=>'add')); ?> </li>
	</ul>
</div>
