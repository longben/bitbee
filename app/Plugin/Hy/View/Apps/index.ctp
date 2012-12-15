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
            <li><a href="/zh/product/1"><img src="/hy/img/cclass1.jpg" border="0" /></a></li>
            <li><a href="/zh/product/2"><img src="/hy/img/cclass2.jpg" border="0" /></a></li>
            <li><a href="/zh/product/3"><img src="/hy/img/ctempclass1.jpg" border="0" /></a></li>
            <li><a href="/zh/product/4"><img src="/hy/img/cclass4.jpg" border="0" /></a></li>
            <li><a href="/zh/product/5"><img src="/hy/img/cclass5.jpg" border="0" /></a></li>
            <li><a href="/zh/product/6"><img src="/hy/img/cclass6.jpg" border="0" /></a></li>
            <li><a href="/zh/product/7"><img src="/hy/img/cclass7.jpg" border="0" /></a></li>
            <li><a href="/zh/product/8"><img src="/hy/img/cclass8.jpg" border="0" /></a></li>
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
                        <?php foreach($news as $post):?>
                        <li><a href="<?php echo $this->Html->url('/app/content/'.$post['Post']['id'])?>" target="_blank"><?php echo $post['Post']['post_title']?></a> [<?=date("Y-m-d",strtotime($post['Post']['post_date']))?>]</li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
            <div class="flv">
                <div style="position: relative; left: 60px; top: 34px;">
                    <a onclick="popup('#popup_video_home_orubase','#video_link1','http://www.youtube.com/embed/ESFmwhY8qS8')" id="video_link1" href="javascript:void(0)">
                        <img onmouseover="mouseOverImage('#video_link1 img')" onmouseout="mouseOutImage('#video_link1 img')" src="/hy/img/play_normal.png" border="0">
                    </a>
                </div>
            </div>
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

<script type="text/javascript" language="javascript">
    function mouseOverImage(videoid) {
        var imageUrl = "/hy/img/play_hover.png";
        $(videoid).attr("src", imageUrl);
    }

    function mouseOutImage(videoid) {
        var imageUrl = "/hy/img/play_normal.png";
        $(videoid).attr("src", imageUrl);
    }
</script>


<script language="javascript" type="text/javascript">
    function popup(popupid, videoid, videourl) {
        $(videoid).colorbox({ width: "900px", height: "500px", inline: true, href: popupid });
        $("body").css("overflow", "hidden");
        $(popupid + " iframe").attr("src", videourl + "?autoplay=1&hd=1");

        $("#cboxClose").click(function () {
            $(popupid + " iframe").attr("src", "");
            $("body").css("overflow", "auto");
        });

        $("#cboxOverlay").click(function () {
            $(popupid + " iframe").attr("src", "");
            $("body").css("overflow", "auto");
        });
    }
</script>
