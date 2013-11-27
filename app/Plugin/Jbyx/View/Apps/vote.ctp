<div class="content_center">
    <div class="post_box">
        <div class="post_title"><?=$poll['Polls']['question']?></div>
        <div><?=$poll['Polls']['description']?></div>
        <div class="post_content">
            <form>
                <?php foreach($options as $i => $o):?>
                <div><input type="text" class="field mm" id="menu" name="data[PollOption][<?=$i?>][option]" value="<?php echo $o['PollOption']['option']?>"/></div>
                <div><input type="hidden" name="data[PollOption][<?=$i?>][id]" value="<?php echo $o['PollOption']['id']?>"/></div>
                <?php endforeach;?>
            </form>
        </div>
        <div class="gbbox">
            <div align="center">
                <a href="javascript:window.close()"><img src="/jbyx/img/news_close.gif" width="65" height="22" border="0" /></a>
                <br/>
            </div>
        </div>
    </div>
</div>

<?php print_r($options);?>
