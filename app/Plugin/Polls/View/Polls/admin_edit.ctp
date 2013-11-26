<div class="polls form">
    <?php echo $this->Form->create('Poll');?>
    <?php
    echo $this->Form->input('id');
    echo $this->Form->input('question');
    echo $this->Form->input('description');
    echo $this->Form->end();
    ?>
</div>
