<div class="polls form">
    <?php echo $this->Form->create('Poll', array('id' => 'bbForm','class' => 'formee'));?>
	<?php
		echo $this->Form->input('Poll.question');
		echo $this->Form->input('Poll.description');
		echo $this->Form->input('PollOption.0.option', array('div' => array('class' => 'input text pollOption')));
        echo $this->Form->end();
	?>

    <a href="javascript:;" class="newOptionLink">新增投票选项</a>
</div>
<?php echo $this->Html->script('/js/jquery/jquery.FormModifier.js');?>
<?php echo $this->Html->script('/polls/poll.js');?>
