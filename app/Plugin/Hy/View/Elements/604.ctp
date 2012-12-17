<div class="comments-template">

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
            <img height="40" width="40" class="avatar" src="/img/avatar.png" alt=""><strong class="commentauthor2">H&Y</strong>
            <span class="commentdate"><a title="" href="#comment-<?=$g['Guestbook']['id']?>"><?=$g['Guestbook']['modified']?></a></span><br/>
            <?=$g['Guestbook']['reply_content']?>
        </div>
        </li>
        <?php endforeach;?>
    </ol>




    <h3 id="respond">Leave a Reply</h3>
    <form id="commentform" method="post" action="/zh/add_guestbook">

        <input type="hidden" name="data[Guestbook][type_id]" value="1" />

        <p><input type="text" tabindex="1" size="40" id="author" name="data[Guestbook][username]">
        <label for="author"><small>Name (required)</small></label></p>

        <p><input type="text" tabindex="2" size="40" id="email" name="data[Guestbook][email]">
        <label for="email"><small>Mail (will not be published) (required)</small></label></p>

        <p><input type="text" tabindex="3" size="40" id="telephone" name="data[Guestbook][telephone]">
        <label for="url"><small>Website</small></label></p>

        <p><textarea tabindex="4" rows="10" cols="60" id="comment" name="data[Guestbook][content]"></textarea></p>

        <p><input type="submit" value="提交反饋" tabindex="5" id="submit" name="submit"></p>

    </form>


</div>

