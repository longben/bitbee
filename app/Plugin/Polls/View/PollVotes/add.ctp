<div class="pollVotes form">
	<h2><?php echo $poll['Poll']['question']; ?></h2>
    <p><?php echo $poll['Poll']['description']; ?></p>
<?php
if (!empty($votes)) {
	foreach ($votes as $vote) { ?>
    	<div class="pollVotes results"><span class="label optionName"><?php echo $vote['PollOption']['option']; ?></span> <span class="voteCount"><?php echo $vote['PollOption']['vote_count']; ?></span></div>
<?php } // end vote loop ?>
    <div class="totalVotes"><span class="label voteTotal"><?php echo __('Total Votes'); ?></span> <span class="voteTotal"><?php echo $voteTotal; ?></span></div>
<?php
} else {
	echo $this->Form->create('PollVote');?>
	<fieldset>
	<?php
		echo $this->Form->input('PollVote.poll_id', array('type' => 'hidden', 'value' => $poll['Poll']['id']));
		echo $this->Form->input('PollVote.poll_option_id', array('type' => 'radio', 'legend' => false));
		echo $this->Form->input('PollVote.user_id', array('type' => 'hidden', 'value' => $user));
		echo $this->Form->input('PollOption.option', array('label' => 'Add Option'));
		echo $this->Form->input('PollOption.poll_id', array('type' => 'hidden', 'value' => $poll['Poll']['id'])); ?>
	</fieldset>
<?php 
	echo $this->Form->end(__('Vote')); 
} ?>
</div>
<?php  /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Poll Votes'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Polls'), array('controller' => 'polls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll'), array('controller' => 'polls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Poll Options'), array('controller' => 'poll_options', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll Option'), array('controller' => 'poll_options', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>*/ ?>
