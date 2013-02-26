<div id="warp">
    <div class="bannerbg inpagebanner">
        <div class="bannersbg"></div>
    </div>
</div>

<div class="secpagecon">
    <div class="weizhi"><a href="">首頁</a> &gt; 新聞活動</div>
    <div class="geline"></div>
    <div class="pagetitle shadow">新聞活動</div>
    <div class="seconmenu">
        <div class="in" id="showmenus">
            <div class="<?=$page==501?'over':'no'?> secmenus" id="menu1"><a href="/zh/news/501">參展活動</a></div>
            <div class="<?=$page==502?'over':'no'?> secmenus" id="menu2"><a href="/zh/news/502">企業新聞</a></div>
            <div class="<?=$page==503?'over':'no'?> secmenus" id="menu3"><a href="/zh/news/503">線下活動</a></div>
        </div>
    </div>

    <div class="newslist">

        <?php foreach($news as $p):?>
        <div class="lists">
            <div class="pics">
                <div class="pic">
                    <img src='<?php echo dirname($p['Meta']['picture']).'/240x180_'.basename($p['Meta']['picture'])?>' width="216" height="141" /> 
                </div>
                <div class="shadowbo"><img src="/hy2/img/pic_shadow.png" width="100%" /></div>
            </div>
            <div class="words">
                <table width="100%" cellpadding="0" cellspacing="0" border="0" >
                    <tr>
                        <td valign="middle" height="153">
                            <?=$this->Html->link($p['Post']['post_title'], '/zh/content/'.$p['Post']['id'], array('target' => '_blank', 'class' => 'titles'))?><br />
                            <span class="intro">
                                <?php echo $this->Text->truncate( trim(strip_tags($p['Post']['post_content'])) , 200, array('ending' => '...', 'exact' => true, 'html' => true) )?>
                                <a href="/zh/content/<?=$p['Post']['id']?>" target="_blank">[詳情]</a>
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <?php endforeach;?>

    </div>
