<?php
$this->Html->script(array('/wczhs/js/AutoChangePhoto', '/wczhs/js/MSClass', '/js/jquery/jquery.KinSlideshow-1.2.1.min'), array('inline' => false));
?>
<script type="text/javascript">
    var moveStyle
    var rand =parseInt(Math.random()*4)
    switch(rand){
        case 0:	moveStyle="left" ;break;
        case 1:	moveStyle="right" ;break;
        case 2:	moveStyle="down" ;break;
        case 3:	moveStyle="up" ;break;
    }
    $(function(){
        $("#KinSlideshow1").KinSlideshow({moveStyle:moveStyle});
    });

    $(window).load(function() { 
        new Marquee("gundongmarquee",'left',1,672,133,20,0,0,1);
    });
</script>
<style type="text/css">
    #KinSlideshow{ overflow:hidden; width:1004px; height:329px;}
</style>

<div class="flashad">
    <div class="showit">
        <div id="KinSlideshow1" style="visibility:hidden;">
            <!--轮换大图B-->
            <?php foreach($covers as $cover):?>
            <a href="#"><img src="/upload/user/images/<?=$cover['Attachment']['file_path']?>" width="1004" height="329" alt="<?=$cover['Attachment']['name']?>"/></a>
            <?php endforeach;?>
            <!--轮换大图E-->
        </div>
    </div>
    <div class="bottombg"></div>
</div>

<div class="outdiv" style="padding-top:8px;">
    <div class="indexleft">
        <div class="bluepannel">
            <div class="title">
                <div class="left"><div class="right"><div class="title1"></div></div></div>
            </div>
            <div class="indexkcintro">
                <!-- 课程介绍B -->
                <ul>
                    <?php foreach($courses as $post):?>
                    <li><a href="<?php echo $this->Html->url('/app/content/'.$post['Post']['id'])?>" target="_blank"><?php echo $post['Post']['post_title']?></a></li>
                    <?php endforeach;?>
                </ul>
                <!-- 课程介绍E -->
            </div>
            <div class="bottom">
                <div class="left"><div class="right"></div></div>
            </div>
        </div>
    </div>

    <div class="indexmiddel">
        <div class="greenpannel">
            <div class="title">
                <div class="left"><div class="right"><div class="title2"></div></div></div>
            </div>
            <div class="indexhuodong">
                <!--最新活动B-->
                <table id=pictable style="display: none">
                    <tbody>
                        <?php foreach($images as $post):?>
                        <tr>
                            <td><img src='<?php echo dirname($post['Meta']['picture']).'/240x180_'.basename($post['Meta']['picture'])?>'/></td>
                            <td><?php echo $post['Post']['post_title']?></td>
                            <td><?php echo $this->Html->url('/app/content/'.$post['Post']['id'])?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <!--最新活动E-->
                <div class="indexhuodong">
                    <div class=div_xixi> 
                        <script language=javascript type=text/javascript> 
                            var picarry = {};
                            var lnkarry = {};
                            var ttlarry = {};
                            function FixCode(str){
                                return str.replace("'","=");
                            }
                            var t=document.getElementById("pictable");
                            var rl=t.rows.length;
                            var baseu=  document.URL.replace(/(http.*\/)(.*)/, "$1"); 
                            if(baseu.indexOf("/servlet/")>=0)
                                baseu = baseu.replace("/servlet/","/");

                            var txt="";
                            for(var i=0;i<rl;i++){
                                try{
                                    picarry[i]=t.rows[i].cells[0].childNodes[0].src;
                                    lnkarry[i]=t.rows[i].cells[2].innerHTML;
                                    ttlarry[i]=FixCode(t.rows[i].cells[1].innerHTML);
                                    document.getElementById("li_jimg"+i).innerHTML = '<a href="'+lnkarry[id]+'" target="_blank" class="img"><img src="'+picarry[id]+'" border="0" alt=""><\/a>';
                                    alert(picarry[i]);
                                }catch(e){

                                }
                            }   
                            string="";
                            if(rl>0){
                                string +="<div class='div_jimg\'><a class='a_jimg' id='a_jimg' href='"+lnkarry[0]+"' title='' target='_blank'><img id='bigimg' style='filter:RevealTrans (duration='1',transition='23'); visibility:visible;' alt='' src='"+picarry[0]+"' border='0'><\/a><ul class='ul_jimg'>";
                                for(var i=0;i<rl;i++){
                                    if(i==0){
                                        string +="<li class='li_jimg on' id='li_jimg"+i+"' onmouseover='setfoc("+i+")' onmouseout='playit()'><a href='"+lnkarry[i]+"' target='_blank' class='img'>"+ttlarry[i]+"<\/a><\/li>\r";
                                    }else{
                                        string +="<li class='li_jimg' id='li_jimg"+i+"' onmouseover='setfoc("+i+")' onmouseout='playit()'><a href='"+lnkarry[i]+"' target='_blank' class='img'>"+ttlarry[i]+"<\/a><\/li>\r"
                                    }
                                }
                                string +="<\/ul><\/div>";
                            }
                            document.write(string);
                        </script> 
                    </DIV>
                </div>

            </div>
            <div class="bottom"><div class="left"><div class="right"></div></div></div>
        </div>
    </div>

    <div class="indexright">
        <div class="bluepannel">
            <div class="title">
                <div class="left"><div class="right"><div class="title3"></div></div></div>
            </div>
            <div class="indexkcintro">
                <!-- 新闻资讯 -->
                <ul>
                    <?php foreach($news as $post):?>
                    <li><a href="<?php echo $this->Html->url('/app/content/'.$post['Post']['id'])?>" target="_blank"><?php echo $post['Post']['post_title']?></a> [<?=date("Y-m-d",strtotime($post['Post']['post_date']))?>]</li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="bottom">
                <div class="left"><div class="right"></div></div>
            </div>
        </div>
    </div>

</div>
<div class="outdiv" style="margin-top:8px;">
    <div class="indexzhuoping">
        <div class="title"></div>
        <div class="marqueepic" id="gundongmarquee">
            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <!--宝宝作品-->
                    <?php foreach($works as $work):?>
                    <td>
                        <a href="/app/content/<?=$work['Post']['id']?>" target="_blank">
                            <img src="<?php echo dirname($post['Meta']['picture']).'/240x180_'.basename($post['Meta']['picture'])?>" height="127" alt="<?=$work['Post']['post_title']?>" border="0" style="padding:2px;border:1px solid #ccc;" />
                        </a>
                    </td>
                    <td>&nbsp;</td>
                    <?php endforeach;?>
                </tr> 
            </table>
        </div>
    </div>
    <div class="indexrightad"><a href="/app/contact/application" target="_blank"><img src="/wczhs/img/free.jpg" border="0" /></a></div>
</div>

<div class="outdiv" style="margin-top:8px;">
    <div class="friendtop"><div class="left"><div class="right"></div></div></div>
    <div class="friendcon">
        <div class="in">
            <ul>
                <?php foreach($links as $link):?>
                <li><a href="<?=$link['Attachment']['url']?>" target="_blank"><img src="/upload/user/images/<?=$link['Attachment']['file_path']?>" width="180" height="66" border="0"/></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <div class="friendbottom"><div class="left"><div class="right"></div></div></div>
</div>
