<!--轮换图片-->
<div id="photo">
    <div id="newsSlider">
        <div class="container">
            <ul class="slides">
                <?php foreach($covers as $cover):?>
                <li><a href="#" ><img src="/upload/user/images/<?=$cover['Attachment']['file_path']?>" border="0"></a></li>
                <?php endforeach;?>
            </ul>
        </div>
        <div class="validate_Slider"></div>
        <ul class="pagination">
            <?php foreach($covers as $cover):?>
            <li><a href="javascript:;"></a> </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>

<div class="ct"> 
    <!--最新消息start-->
    <div id="zxxx">
        <div class="more"><a href="#" target="_self">更多></a></div>
        <div class="news_list">
            <ul>
                <?php foreach($news as $p):?>
                <li class="newslist"><a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>"  target="_blank"><?=$p['Post']['post_title']?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <!--最新消息end--> 
    <!--本园研究start-->
    <div id="byyj">
        <div class="more"><a href="#" target="_self">更多></a></div>
        <div class="news_list">
            <ul>
                <?php foreach($byyj as $p):?>
                <li class="newslist"><a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>"  target="_blank"><?=$p['Post']['post_title']?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <!--本园研究end--> 
</div>
<div class="ct">
    <div class="left"> 
        <!--园长信箱start-->
        <div><a href="/app/mailbox" target="_self"><img src="/jg3you/img/index_15.png" width="245" height="275" border="0" /></a></div>
        <!--园长信箱end--> 
        <!--每周安排start-->
        <div id="zmap">
            <div class="moresmall"><a href="#" target="_self">更多></a></div>
            <ul>
                <?php foreach($mzap as $p):?>
                <li class="mzap"><a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>"  target="_blank"><?=$p['Post']['post_title']?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
        <!--每周安排end--> 
        <!--温馨提示start-->
        <div id="wxts">
            <div class="moresmall"><a href="#" target="_self">更多></a></div>
            <ul>
                <?php foreach($wxts as $p):?>
                <li class="mzap"><a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>"  target="_blank"><?=$p['Post']['post_title']?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
        <!--温馨提示end--> 
        <!--每周食谱start-->
        <div id="mzsp">
            <div class="moresmall"><a href="#" target="_self">更多></a></div>
            <ul>
                <?php foreach($mzsp as $p):?>
                <li class="mzap"><a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>"  target="_blank"><?=$p['Post']['post_title']?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
        <!--每周食谱end--> 
    </div>
    <div class="left705">
        <div> 
            <!--班级博客start-->
            <div id="bjbk">
                <div class="more"><a href="#" target="_self">更多></a></div>
                <ul>
                    <?php foreach($wxbj as $p):?>
                    <li class="gjdxhdd"><a href="/blog/main/archive/<?=$p['Post']['post_author']?>/<?=$p['Post']['id']?>"  title="<?=$p['Post']['post_title']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <!--班级博客end--> 
            <!--家委会活动start-->
            <div id="jwhhd">
                <div class="more"><a href="#" target="_self">更多></a></div>
                <ul>
                    <?php foreach($jwhhd as $p):?>
                    <li class="gjdxhdd"><a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>"  target="_blank"><?=$p['Post']['post_title']?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <!--家委会活动end--> 
        </div>
        <div> 
            <!--保健保育研究start-->
            <div id="bjbyyj">
                <div class="more"><a href="#" target="_self">更多></a></div>
                <ul>
                    <?php foreach($bybjhd as $p):?>
                    <li class="gjdxhdd"><a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>"  target="_blank"><?=$p['Post']['post_title']?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <!--保健保育研究end--> 
            <!--教师随笔start-->
            <div id="jssb">
                <div class="more"><a href="#" target="_self">更多></a></div>
                <ul>
                    <?php foreach($jssb as $p):?>
                    <li class="gjdxhdd"><a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>"  target="_blank"><?=$p['Post']['post_title']?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <!--教师随笔end--> 
        </div>
        <!--温馨班级start-->
        <div id="wxbj">
            <div id="jywenhua_photo">
                <div id="demo">
                    <div id="indemo">
                        <div id="demo1"> <span class="hengxiangphoto"><a href="#" target="_blank" class="145110" ><img src="/jg3you/img/photo_01.gif" border="0" alt="蛋糕"/></a></span> <span class="hengxiangphoto"><a href="#" target="_blank" class="145110" ><img src="/jg3you/img/photo_02.gif" border="0" alt="蛋糕"/></a></span> <span class="hengxiangphoto"><a href="#" target="_blank" class="145110" ><img src="/jg3you/img/photo_03.gif" border="0" alt="蛋糕"/></a></span> </div>
                        <div id="demo2"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--温馨班级end--> 
    </div>
</div>

<script type="text/javascript">
    function MM_jumpMenu(targ,selObj,restore){ //v3.0
        eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
        if (restore) selObj.selectedIndex=0;
    }
</script>
<script type="text/javascript" src="/jg3you/js/focus.js"></script>
<script type="text/javascript" src="/jg3you/js/wenhua.js"></script>

