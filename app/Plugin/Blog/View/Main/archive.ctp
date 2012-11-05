<div id="main">
    <div id="primary">
        <div id="content" role="main">

            <nav id="nav-single">
            <h3 class="assistive-text">Post navigation</h3>
            <span class="nav-previous"><a href="" rel="prev"><span class="meta-nav"> < </span>上一篇</a></span>
            <span class="nav-next"></span>
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
                <div id="respond">
                    <h3 id="reply-title">发表评论 <small><a rel="nofollow" id="cancel-comment-reply-link" href="/index.php/archives/155#respond" style="display:none;">取消回复</a></small></h3>
                    <form action="/blog/main/comment" method="post" id="commentform">
                        <p class="comment-notes">电子邮件地址不会被公开。 必填项已用 <span class="required">*</span> 标注</p>
                        <p class="comment-form-author">
                        <label for="author">姓名</label> <span class="required">*</span>
                        <input id="author" name="data[Comment][author]" type="text" value="" size="30" aria-required='true' />
                        </p>
                        <p class="comment-form-email">
                        <label for="email">电子邮件</label> <span class="required">*</span>
                        <input id="email" name="data[Comment][author_email]" type="text" value="" size="30" aria-required='true' />
                        </p>
                        <p class="comment-form-url">
                        <label for="url">站点</label><input id="url" name="data[Comment][author_url]" type="text" value="" size="30" />
                        </p>
                        <p class="comment-form-comment">
                        <label for="comment">评论</label><textarea id="comment" name="data[Comment][content]" cols="45" rows="8" aria-required="true"></textarea>
                        </p>
                        <p class="form-submit">
                        <input name="submit" type="submit" id="submit" value="发表评论" />
                        <input type='hidden' name='data[Comment][post_id]' value='155' id='comment_post_id' />
                        <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                        </p>
                    </form>
                </div><!-- #respond -->
            </div><!-- #comments -->

        </div><!-- #content -->
    </div><!-- #primary -->

</div><!-- #main -->
