<div class="menus index">
	<h2><?php echo __('Menus'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('alias'); ?></th>
			<th><?php echo $this->Paginator->sort('class'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('weight'); ?></th>
			<th><?php echo $this->Paginator->sort('link_count'); ?></th>
			<th><?php echo $this->Paginator->sort('params'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($menus as $menu): ?>
	<tr>
		<td><?php echo h($menu['Menu']['id']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['user_id']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['title']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['alias']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['class']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['description']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['status']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['weight']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['link_count']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['params']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['updated']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $menu['Menu']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $menu['Menu']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $menu['Menu']['id']), null, __('Are you sure you want to delete # %s?', $menu['Menu']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Menu'), array('action' => 'add')); ?></li>
	</ul>
</div>
