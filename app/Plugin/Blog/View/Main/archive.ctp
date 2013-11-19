<div id="main">
    <div id="primary">
        <div id="content" role="main">

            <nav id="nav-single">
            <h3 class="assistive-text">Post navigation</h3>
            <?php if(isset($neighbors['prev'])):?>
            <span class="nav-previous"><a href="/blog/main/archive/<?=$user['User']['id']?>/<?=$neighbors['prev']['Post']['id']?>" rel="prev"><span class="meta-nav"></span>上一篇</a></span>
            <?php endif;?>
            <?php if(isset($neighbors['next'])):?>
            <span class="nav-next"><a href="/blog/main/archive/<?=$user['User']['id']?>/<?=$neighbors['next']['Post']['id']?>" rel="prev"><span class="meta-nav"></span>下一篇</a></span>
            <?php endif;?>
            </nav><!-- #nav-single -->

            <article class="post type-post status-publish format-standard hentry category-4 category-album">
            <header class="entry-header">
            <h1 class="entry-title"><?=$post['Post']['post_title']?></h1>
            <div class="entry-meta">
                <?php echo $post['Post']['post_date'];?>
            </div><!-- .entry-meta -->
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?=$post['Post']['post_content']?>
            </div><!-- .entry-content -->

            <footer class="entry-meta">
            .
            </footer><!-- .entry-meta -->
            </article><!-- #post -->

            <div id="comments">

                <ol class="commentlist">
                    <?php foreach($comments as $comment):?>
                    <li id="li-comment-2" class="comment even thread-even depth-1">
                    <article class="comment" id="comment-2">
                    <footer class="comment-meta">
                    <div class="comment-author vcard">
                        <img width="68" height="68" class="avatar photo" src="/blog/img/gravatar.png" alt="">
                        <span class="fn"><?=$comment['Guestbook']['username']?> 说：</span>
                    </div><!-- .comment-author .vcard -->
                    </footer>
                    <div class="comment-content"><p><?=$comment['Guestbook']['content']?></p></div>
                    </article><!-- #comment-## -->

                    <?php if(!empty($comment['Guestbook']['reply_content'])):?>
                    <ul class='children'>
                        <li class="comment byuser comment-author-admin odd alt depth-2" id="li-comment-265">
                        <article id="comment-265" class="comment">
                        <footer class="comment-meta">
                        <div class="comment-author vcard">
                            <img alt='' src='/blog/img/gravatar.png' class='avatar avatar-39 photo' height='39' width='39' />
                            <span class="fn">老师</span> 在 <time><?=$comment['Guestbook']['modified']?></time><span class="says">说:</span>
                        </div><!-- .comment-author .vcard -->
                        </footer>
                        <div class="comment-content"><p><?=$comment['Guestbook']['reply_content']?></p></div>
                        </article><!-- #comment-## -->
                        </li>
                    </ul>
                    <?php endif;?>

                    </li>
                    <?php endforeach;?>
                </ol>


                <div id="respond">
                    <h3 id="reply-title">发表评论 <small><a rel="nofollow" id="cancel-comment-reply-link" href="/index.php/archives/155#respond" style="display:none;">取消回复</a></small></h3>
                    <form action="/blog/main/fbppll" method="post" id="commentform">
                        <p class="comment-notes">电子邮件地址不会被公开。 必填项已用 <span class="required">*</span> 标注</p>
                        <p class="comment-form-author">
                        <label for="author">姓名</label> <span class="required">*</span>
                        <input id="author" name="data[Guestbook][username]" type="text" value="" size="30" aria-required='true' class="easyui-validatebox" required="1"/>
                        </p>
                        <p class="comment-form-email">
                        <label for="email">电子邮件</label> <span class="required">*</span>
                        <input id="email" name="data[Guestbook][email]" type="text" value="" size="30" aria-required='true' class="easyui-validatebox" required="1"/>
                        </p>
                        <p class="comment-form-url">
                        <label for="url">站点</label><input id="url" name="data[Guestbook][homepage]" type="text" value="" size="30" />
                        </p>
                        <p class="comment-form-comment">
                        <label for="comment">评论</label><textarea id="comment" name="data[Guestbook][content]" cols="45" rows="8" aria-required="true" class="easyui-validatebox" required="1"></textarea>
                        </p>
                        <p class="form-submit">
                        <input name="submit" type="submit" id="submit" value="发表评论" />
                        <input type='hidden' name='data[Guestbook][object_id]' value='<?=$post['Post']['id']?>' id='comment_post_id' />
                        <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                        </p>
                    </form>
                </div><!-- #respond -->
            </div><!-- #comments -->

        </div><!-- #content -->
    </div><!-- #primary -->

</div><!-- #main -->
