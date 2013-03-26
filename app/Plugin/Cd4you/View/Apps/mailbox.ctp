<div class="w950">
<div class="sidebar_left">
    <div class="column_name">园长信箱</div>
    <!---子菜单start--->
    <div class="submenu">
        <div class="cbl_list">
            <ul>
                <li class="cbl_xz">李远秀</li>
            </ul>
        </div>
    </div>
    <!---子菜单end--->
    <div class="back"><a href="/" target="_self" onFocus=this.blur()><img src="/cd4you/img/list_10.png" border="0"/></a></div>
    <div class="bj_001"></div>
</div>

<div class="blog_content">
    <div class="title_namess"><img src="/cd4you/img/3.png"  border="0"/></div>
    <div class="column_box">
        <!---栏目名称start--->
        <div class="title_left">园长信箱</div>
        <!---栏目名称end--->
        <!---地址导航start--->
        <div class="subnav"><a> &rarr; 园长信箱</a></div>
        <!---地址导航end--->
    </div>
	
	
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
                <img height="40" width="40" class="avatar" src="/img/avatar.png" alt=""><strong class="commentauthor2">成都四幼</strong>
                <span class="commentdate"><a title="" href="#comment-<?=$g['Guestbook']['id']?>"><?=$g['Guestbook']['modified']?></a></span><br/>
                <?=$g['Guestbook']['reply_content']?>
            </div>
            </li>
            <?php endforeach;?>
        </ol>


        <h3 id="respond">给园长留言</h3>
        <form id="commentform" method="post" action="/app/add_guestbook">

            <input type="hidden" name="data[Guestbook][type_id]" value="1" />

            <p><input type="text" tabindex="1" size="40" id="author" name="data[Guestbook][username]">
            <label for="author"><small>姓名（必填）</small></label></p>

            <p><input type="text" tabindex="2" size="40" id="email" name="data[Guestbook][email]">
            <label for="email"><small>电子邮箱（必填）</small></label></p>

            <p><input type="text" tabindex="3" size="40" id="telephone" name="data[Guestbook][telephone]">
            <label for="url"><small>Website</small></label></p>

            <p><textarea tabindex="4" rows="10" cols="60" id="comment" name="data[Guestbook][content]"></textarea></p>

            <p><input type="submit" value="提交留言" tabindex="5" id="submit" name="submit"></p>

        </form>
    </div>	
    <!---列表end--->
</div>
</div>
