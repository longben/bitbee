<div class="polls form">
  <?php echo $this->Form->create('Poll', array('id' => 'bbForm','class' => 'formee'));?>
  <?php
  echo $this->Form->input('id');
  echo $this->Form->input('question');
  echo $this->Form->input('description');
  ?>

  <div class="input text pollOption required"><label for="PollOption0Option">Option</label>
  <?php foreach($this->request->data['PollOption'] as $i => $o):?>
  <div><input type="text" class="field mm" id="menu" name="data[PollOption][<?=$i?>][option]" value="<?php echo $o['option']?>"/></div>
  <div><input type="hidden" name="data[PollOption][<?=$i?>][id]" value="<?php echo $o['id']?>"/></div>
  <?php endforeach;?>
  </div>
  <?php echo $this->Form->end();?>
</div>
