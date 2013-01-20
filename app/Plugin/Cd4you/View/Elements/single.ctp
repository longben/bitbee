<!---列表start--->
<?php foreach($news as $p):?>
<div class="list_newst">
    <div class="btwo_news"><?=$p['Post']['post_title']?></div>
    <div class="nametime">撰稿人：某靶标 　2012-11-22</div>
    <div class="ct_pci" align="center">  </div>
    <div class="content_news">
        <?=$p['Post']['post_content']?>
    </div>
    <div class="fg_line"></div>
</div>
<?php endforeach;?>
<!---列表end--->
