<div class="content_center">
  <div class="post_box">
    <div class="post_title"><?=$poll['Polls']['question']?></div>
    <div><?=$poll['Polls']['description']?></div>
    <div class="post_content">
      <form method="post" class="formee">
        <div class="grid-12-12">
          <ul class="formee-list">
            <?php foreach($options as $i => $o):?>
            <li>
            <input type="radio" name="data[PollOption][vote_count]" value="<?php echo $o['PollOption']['id']?>"/>
            <label><?php echo $o['PollOption']['option']?></label>
            </li>
            <?php endforeach;?>
          </ul>
        </div>
        <input type="hidden" name="data[PollOption][id]" value="<?php echo $o['PollOption']['id']?>"/>
        <div class="grid-6-12 clear"> </div>
        <div class="grid-6-12">
          <input class="right" type="submit" value="投票" title="投票">
        </div>
      </form>
    </div>
  </div>
</div>
</div>
