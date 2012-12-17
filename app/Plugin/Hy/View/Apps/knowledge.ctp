<div class="flash" style="border:1px dotted #ccc;"><img src="/hy/img/cknowledge_title.jpg" /></div>

<div class="outdiv">
    <div class="inpageleft">
        <?php echo $page==701?'<span>濾鏡百科全書</span>':'<a href="/zh/knowledge/701">濾鏡百科全書</a>'?>
        <?php echo $page==702?'<span>濾鏡使用展示</span>':'<a href="/zh/knowledge/702">濾鏡使用展示</a>'?>
        <?php echo $page==703?'<span>精品對比圖</span>':'<a href="/zh/knowledge/703">精品對比圖</a>'?>
    </div>

    <div class="inpageright">
        <div style="width:786px;padding:10px;height:auto;clear:both;overflow:hidden"><span class="blue">專業知識</span></div>

        <?php foreach($news as $p):?>
        <div class="titlebg">
            <div class="titleleft">
                <div class="titleright">
                    <div class="titlewords" style="padding-top:15px;"><?=$this->Html->link($p['Post']['post_title'], 1)?></div>
                    <div class="titledate" style="padding-top:15px;"><?=date("Y-m-d",strtotime($p['Post']['post_date']))?></div>
                </div>
            </div>
        </div>
        <div class="rightcontent">
            <?php if( empty($p['Meta']['picture']) ):?>
            <a href="/zh/content/<?=$p['Post']['id']?>"><?php echo $this->Text->truncate( trim(strip_tags($p['Post']['post_content'])) , 200, array('ending' => '...', 'exact' => true, 'html' => true) )?></a>
            <?php else:?>
            <div class="newssmlpic">
                <table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td align="center" valign="middle">
                            <a href="/zh/content/<?=$p['Post']['id']?>">
                                <img src='<?php echo dirname($p['Meta']['picture']).'/240x180_'.basename($p['Meta']['picture'])?>'/>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="newsintro">
                <a href="/zh/content/<?=$p['Post']['id']?>"><?php echo $this->Text->truncate( trim(strip_tags($p['Post']['post_content'])) , 200, array('ending' => '...', 'exact' => true, 'html' => true) )?></a>
            </div>
            <?php endif;?>
        </div>
        <?php endforeach;?>

    </div>
</div>
