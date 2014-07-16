<div class="ct"> 
    <!--侧边栏导航start-->
    <div id="sidebar">
        <div><img src="/jg3you/img/page_head_4.gif" width="240" height="240" border="0" /></div>
        <div id="sidebarzxxx">
            <ul>
                <li class="sub_nav">园长信箱</li>
                <li class="sub_nav_li_4"></li>
            </ul>
        </div>
        <div><a href="/"><img src="/jg3you/img/page_bottom_4.gif" width="239" height="199" border="0" /></a></a></div>
</div>
<!--侧边栏导航end-->
<div id="container">
    <div id="containerbox">
        <div class="column">园长信箱</div>
        <div class="andbox">
            <div class="english">Mailbox</div>
            <div class="samllnav">首页 &rarr; 园长信箱</div>
        </div>
    </div>
    <div><img src="/jg3you/img/list_03.gif" width="710" height="48" border="0" /></div>

    <!---列表start--->
    <div class="comments-template" style="width:95%,align:center,font-size:11pt">

        <!-- You can start editing here. -->
        <ol class="commentlist">

            <?php foreach($guestbooks as $i=>$g):?>
            <li id="comment-<?=$g['Guestbook']['id']?>" <?php echo $i%2 == 0?'class="alt"':''?>>
            <div class="commentmetadata">
                <img height="70" width="70" class="avatar" src="/img/avatar.png" alt=""><strong class="commentauthor"><?=$g['Guestbook']['username']?></strong>
                <span class="commentdate"><a title="" href="#comment-<?=$g['Guestbook']['id']?>"><?=$g['Guestbook']['created']?></a></span>
            </div>
            <div class="comment">
                <p><?=$g['Guestbook']['content']?></p>
                <img height="40" width="40" class="avatar" src="/img/avatar.png" alt=""><strong class="commentauthor2">成都三幼</strong>
                <span class="commentdate"><a title="" href="#comment-<?=$g['Guestbook']['id']?>"><?=$g['Guestbook']['modified']?></a></span><br/>
                <?=$g['Guestbook']['reply_content']?>
            </div>
            </li>
            <?php endforeach;?>
        </ol>


        <h3 id="respond">给园长留言</h3>
        <form id="commentform" method="post" action="/app/add_guestbook">

            <input type="hidden" name="data[Guestbook][type_id]" value="1" />

            <p><input type="text" tabindex="1" size="40" id="author" name="data[Guestbook][username]" class="easyui-validatebox" required="1">
            <label for="author"><small>姓名（必填）</small></label></p>

            <p><input type="text" tabindex="2" size="40" id="email" name="data[Guestbook][email]" class="easyui-validatebox" required="1">
            <label for="email"><small>电子邮箱（必填）</small></label></p>

            <p><input type="text" tabindex="3" size="40" id="telephone" name="data[Guestbook][telephone]">
            <label for="url"><small>博客/微博</small></label></p>

            <p><textarea tabindex="4" rows="10" cols="60" id="comment" name="data[Guestbook][content]"></textarea></p>

            <p><input type="submit" value="提交留言" tabindex="5" id="submit" name="submit"></p>

        </form>
    </div>	
    <!---列表end--->	  

</div>
</div>
