<?php if(sizeof($covers) > 0):?>
<div class="flashINDEX">
    <div id="slideBox" class="slideBox">
        <div class="hd">
            <ul>
                <?php for($i=1; $i<=sizeof($covers); $i++):?>
                <li><?php echo $i;?></li>
                <?php endfor;?>
            </ul>
        </div>

        <div class="bd">
            <ul>
                <?php foreach($covers as $cover):?>
                <li><img src="/upload/user/images/<?=$cover['Attachment']['file_path']?>" width="1002" height="273" alt="<?=$cover['Attachment']['name']?>"/></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(".slideBox").slide( { mainCell:".bd ul",effect:"top",autoPlay:true} );
</script>
<?php endif;?>

<div class="outdiv">
    <div class="indexpro"><div class="title1C"></div>
        <ul>
            <li><a href=""><img src="/hy/img/cclass1.jpg" border="0" /></a></li>
            <li><a href=""><img src="/hy/img/cclass2.jpg" border="0" /></a></li>
            <li><a href=""><img src="/hy/img/ctempclass1.jpg" border="0" /></a></li>
            <li><a href=""><img src="/hy/img/cclass4.jpg" border="0" /></a></li>
            <li><a href=""><img src="/hy/img/cclass5.jpg" border="0" /></a></li>
            <li><a href=""><img src="/hy/img/cclass6.jpg" border="0" /></a></li>
            <li><a href=""><img src="/hy/img/cclass7.jpg" border="0" /></a></li>
            <li><a href=""><img src="/hy/img/cclass8.jpg" border="0" /></a></li>
        </ul>
    </div>

    <div class="indexright">
        <div class="titlebg">
            <div class="titleleft">
                <div class="titleright">
                    <div class="titlewords">
                        <?php foreach($features as $i=>$feature):?>
                        <span class="<?php echo $i==0?'changtabover':'changtab'?>" id="smenu<?=$i?>" onclick="showTab('<?=$i?>')"><?=$feature['Post']['post_title']?></span>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>

        <?php foreach($features as $i=>$feature):?>
        <div class="scon indexrightcon1" id="scon<?=$i?>" <?php echo $i==0?'':'style="display:none;"'?>>
            <?php echo $feature['Post']['post_content'];?>
        </div>
        <?php endforeach;?>

        <div class="indexright2">

            <div class="left">
                <div class="titlebg"><div class="titleleft"><div class="titleright"><img src="/hy/img/ctitle02.jpg" border="0" /></div></div></div>
                <div class="indexnewsList">
                    <ul>
                        <li><a href="">新闻资讯标题在这里</a></li>
                        <li><a href="">新闻资讯标题在这里</a></li>
                        <li><a href="">新闻资讯标题在这里</a></li>
                        <li><a href="">新闻资讯标题在这里</a></li>
                    </ul>
                </div>
            </div>
            <div class="flv"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function showTab(i){
        $(".changtabover").attr('class', 'changtab');
        $(".scon").attr('style', 'display:none');

        $("#smenu" + i).attr('class', 'changtabover');
        $("#scon" + i).attr('style', 'display:block');
    }
</script>
