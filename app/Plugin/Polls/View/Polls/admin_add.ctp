<div class="polls form">
<?php echo $this->Form->create('Poll', array('class' => 'formee'));?>
	<?php
		echo $this->Form->input('Poll.question');
		echo $this->Form->input('Poll.description');
		echo $this->Form->input('PollOption.0.option', array('after' => $this->Html->link('Add (+)', array('#'), array('class' => 'newOptionLink')), 'div' => array('class' => 'input text pollOption')));
        echo $this->Form->end();
	?>
</div>
<?php echo $this->Html->script('/js/jquery/jquery.FormModifier.js');?>
<?php echo $this->Html->script('/polls/poll.js');?>
