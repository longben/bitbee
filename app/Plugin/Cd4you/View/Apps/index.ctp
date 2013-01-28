<!---动态图片start--->
<div class="photo">
    <div class="box"><div id="newsSlider">
            <div class="container">
                <ul class=slides>
                    <li><a href="#" ><img src="/cd4you/img/01.jpg"></a></li>
                    <li><a href="#" ><img src="/cd4you/img/02.jpg"></a></li>
                    <li><a href="#" ><img src="/cd4you/img/03.jpg"></a></li>
                    <li><a href="#" ><img src="/cd4you/img/04.jpg"></a></li>
                    <li><a href="#" ><img src="/cd4you/img/05.jpg"></a></li>
                </ul>
            </div>
            <div class="validate_Slider"></div>
            <ul class="pagination">
                <li><a href="#">1</a> </li>
                <li><a href="#">2</a> </li>
                <li><a href="#">3</a> </li>
                <li><a href="#">4</a> </li>
                <li><a href="#">5</a> </li>
            </ul>
    </div></div>
</div>
<!---动态图片end--->
<div class="content_box">
    <!---园长信箱start--->
    <div class="mail_box"><a href="/app/mailbox" target="_self" onFocus=this.blur()><img src="/cd4you/img/index/index_12.png" border="0" /></a></div>
    <!---园长信箱end--->
    <!---最新消息start--->
    <div class="news_box">
        <div class="news">
            <div class="news_list">
                <ul>
                    <?php foreach($news as $p):?>
                    <li class="newslist"><a href="/app/content/<?=$p['Post']['id']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
    <!---最新消息end--->
    <!---校园公告start--->
    <div class="xygg_box">
        <div class="xygg_list">
            <ul>
                <?php foreach($xygg as $p):?>
                <li class="bluefont"><a href="/app/content/<?=$p['Post']['id']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <!---校园公告start--->
</div>
<div class="content_box2">
    <!---全园大型活动start--->
    <div class="gjdxhd_box">
        <div class="gjdxhd_list">
            <ul>
                <?php foreach($qydxhd as $p):?>
                <li class="gjdxhd"><a href="/app/content/<?=$p['Post']['id']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <!---全园大型活动end--->
    <!---特色领域活动start--->
    <div class="tslyhd_box">
        <div class="gjdxhd_list">
            <ul>
                <?php foreach($tslyhd as $p):?>
                <li class="gjdxhd"><a href="/app/content/<?=$p['Post']['id']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <!---特色领域活动end--->
    <!---教研动态start--->
    <div class="jydt_box">
        <div class="xygg_list">
            <ul>
                <?php foreach($jydt as $p):?>
                <li class="bluefont"><a href="/app/content/<?=$p['Post']['id']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <!---教研动态end--->
</div>
<div class="content_box2">
    <!---家园共育start--->
    <div class="jygy_box">
        <div class="gjdxhd_list">
            <ul>
                <?php foreach($jygy as $p):?>
                <li class="gjdxhd"><a href="/app/content/<?=$p['Post']['id']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <!---家园共育end--->
    <!--温馨班级start--->
    <div class="wxbj_box">
        <div class="gjdxhd_list">
            <ul>
                <?php foreach($news as $p):?>
                <li class="gjdxhd"><a href="/app/content/<?=$p['Post']['id']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <!---温馨班级end--->
    <!---集团建设start--->
    <div class="jtjs_box">
        <div class="xygg_list">
            <ul>
                <?php foreach($jtjs as $p):?>
                <li class="bluefont"><a href="/app/content/<?=$p['Post']['id']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <!---集团建设end--->
</div>
<div class="content_box4">
    <!---早教中心start--->
    <div class="zjzx_box">
        <div class="zjzx_list">
            <ul>
                <?php foreach($zjzx as $p):?>
                <li class="zjzx"><a href="/app/content/<?=$p['Post']['id']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <!---早教中心end--->
    <!---营养健康start--->
    <div class="yyjk_box">
        <div class="zjzx_list">
            <ul>
                <?php foreach($yyjk as $p):?>
                <li class="zjzx"><a href="/app/content/<?=$p['Post']['id']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <!---营养健康end--->
    <!---资源共享start--->
    <div class="zygx_box">
        <div class="zjzx_list">
            <ul>
                <?php foreach($zygx as $p):?>
                <li class="zjzx"><a href="/app/content/<?=$p['Post']['id']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <!---资源共享end--->
    <!--在线办事start--->
    <div class="zxbs_box">
        <div class="zjzx_list">
            <ul>
                <?php foreach($news as $p):?>
                <li class="zjzx"><a href="/app/content/<?=$p['Post']['id']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
    <!---在线办事end--->
</div>

<div class="content_linkyqlj">
    <div class="linkyqlj_box"><a href="#" target="_self"  onFocus=this.blur()><img src="/cd4you/img/index/index_26.png" border="0" /></a></div>
    <div class="linkyqlj_box"><a href="#" target="_self"  onFocus=this.blur()><img src="/cd4you/img/index/index_26.png" border="0" /></a></div>
    <div class="linkyqlj_box"><a href="#" target="_self"  onFocus=this.blur()><img src="/cd4you/img/index/index_26.png" border="0" /></a></div>
    <div class="linkyqlj_box"><a href="#" target="_self"  onFocus=this.blur()><img src="/cd4you/img/index/index_26.png" border="0" /></a></div>
    <div class="linkyqlj_box"><a href="#" target="_self"  onFocus=this.blur()><img src="/cd4you/img/index/index_26.png" border="0" /></a></div>
</div>

