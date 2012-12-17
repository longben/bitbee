<div class="flash" style="border:1px dotted #ccc;"><img src="/hy/img/cnews_title.jpg" /></div>
<div class="outdiv">
    <div class="inpageleft">
        <?php echo $page==501?'<span>公司新聞</span>':'<a href="/zh/news/501">公司新聞</a>'?>
        <?php echo $page==502?'<span>行業動態</span>':'<a href="/zh/news/502">行業動態</a>'?>
    </div>

    <div class="inpageright">

        <?php foreach($news as $p):?>
        <div class="titlebg">
            <div class="titleleft">
                <div class="titleright">
                    <div class="titlewords" style="padding-top:15px;">
                        <span class="blue"><?=$this->Html->link($p['Post']['post_title'], '/zh/content/'.$p['Post']['id'], array('target' => '_blank'))?></span>
                    </div>
                    <div class="titledate" style="padding-top:15px;"><?=date("Y-m-d",strtotime($p['Post']['post_date']))?></div>
                </div>
            </div>
        </div>
        <div class="rightcontent">
            <?php if( empty($p['Meta']['picture']) ):?>
            <a href="/zh/content/<?=$p['Post']['id']?>" target="_blank">
                <?php echo $this->Text->truncate( trim(strip_tags($p['Post']['post_content'])) , 200, array('ending' => '...', 'exact' => true, 'html' => true) )?>
            </a>
            <?php else:?>
            <div class="newssmlpic">
                <table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td align="center" valign="middle">
                            <a href="/zh/content/<?=$p['Post']['id']?>" target="_blank">
                                <img src='<?php echo dirname($p['Meta']['picture']).'/240x180_'.basename($p['Meta']['picture'])?>' width="117" height="91" />
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="newsintro">
                <a href="/zh/content/<?=$p['Post']['id']?>" target="_blank">
                    <?php echo $this->Text->truncate( trim(strip_tags($p['Post']['post_content'])) , 200, array('ending' => '...', 'exact' => true, 'html' => true) )?>
                </a>
            </div>
            <?php endif;?>
        </div>
        <?php endforeach;?>

    </div>
</div>
