<?php
// this should be at the top of every element created with format __ELEMENT_PLUGIN_ELEMENTNAME_instanceNumber.
// it allows a database driven way of configuring elements, and having multiple instances of that configuration.
if(!empty($instance) && defined('__POLLS_VOTE_'.$instance)) {
	extract(unserialize(constant('__POLLS_VOTE_'.$instance)));
} else if (defined('__POLLS_VOTE')) {
	extract(unserialize(__POLLS_VOTE));
}
extract($this->requestAction("/polls/poll_votes/vote/{$model}/{$foreignKey}")); ?>
    
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
	echo $this->Form->create('PollVote', array('url' => '/polls/poll_votes/add/'.$poll['Poll']['id']));?>
	<fieldset>
	<?php
		echo $this->Form->input('PollVote.poll_id', array('type' => 'hidden', 'value' => $poll['Poll']['id']));
		echo $this->Form->input('PollVote.poll_option_id', array('type' => 'radio', 'options' => $pollOptions, 'legend' => false));
		echo $this->Form->input('PollVote.user_id', array('type' => 'hidden', 'value' => $user));
		echo $this->Form->input('PollOption.option', array('label' => 'Add Option'));
		echo $this->Form->input('PollOption.poll_id', array('type' => 'hidden', 'value' => $poll['Poll']['id'])); ?>
	</fieldset>
<?php 
	echo $this->Form->end(__('Vote')); 
} ?>
</div>
