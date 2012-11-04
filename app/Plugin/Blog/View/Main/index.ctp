        <div id="main">
            <div id="primary">
                <div id="content" role="main">


                    <nav id="nav-above">
                    <h3 class="assistive-text">Post navigation</h3>
                    <div class="nav-previous"><a href="http://www.zhaoziyou.com/index.php/page/2" ><span class="meta-nav">&larr;</span> Older posts</a></div>
                    <div class="nav-next"></div>
                    </nav><!-- #nav-above -->

                    <?php foreach($posts as $post):?>
                    <article id="post-143" class="post-143 post type-post status-publish format-standard hentry category-4">
                    <header class="entry-header">
                    <h1 class="entry-title">
                        <a href="main/archive/<?=$user['User']['id']?>/<?=$post['Post']['id']?>" title="<?=$post['Post']['post_title']?>" rel="bookmark"><?php echo $post['Post']['post_title']?></a>
                    </h1>

                    <div class="entry-meta">
                    <?=$post['Post']['post_date']?>
                    </div><!-- .entry-meta -->

                    <div class="comments-link">
                        <a href="/blog/main/archive/<?=$user['User']['id']?>/<?=$post['Post']['id']?>#respond" title="《<?php echo $post['Post']['post_title']?>》上的评论"><span class="leave-reply">Reply</span></a>
                    </div>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php echo $post['Post']['post_content'];?>
                    </div><!-- .entry-content -->

                    <footer class="entry-meta">
                    <span class="comments-link">
                        <a href="archives/143#respond" title="《<?php echo $post['Post']['post_title'];?>》上的评论"><span class="leave-reply">评论</span></a>
                    </span>
                    </footer><!-- #entry-meta -->

                    </article><!-- #post-143 -->
                    <?php endforeach;?>


                    <nav id="nav-below">
                    <h3 class="assistive-text">Post navigation</h3>
                    <div class="nav-previous"><a href="" ><span class="meta-nav">&larr;</span> Older posts</a></div>
                    <div class="nav-next"></div>
                    </nav><!-- #nav-above -->


                </div><!-- #content -->
            </div><!-- #primary -->



            <div id="secondary" class="widget-area" role="complementary">
                <aside class="widget widget_search" id="search-2">	<form action="http://wordpress/" id="searchform" method="get">
                    <label class="assistive-text" for="s">搜索</label>
                    <input type="text" placeholder="搜索" id="s" name="s" class="field">
                    <input type="submit" value="搜索" id="searchsubmit" name="submit" class="submit">
                </form>
                </aside>

                <aside id="recent-posts-3" class="widget widget_recent_entries">
                <h3 class="widget-title">近期文章</h3>
                <ul>
                    <?php foreach($posts as $post):?>
                    <li><a href="main/archive/<?=$user['User']['id']?>/<?=$post['Post']['id']?>" title="<?=$post['Post']['post_title']?>"><?=$post['Post']['post_title']?></a></li>
                    <?php endforeach;?>
                </ul>
                </aside>
                <aside id="meta-3" class="widget widget_meta">
                <h3 class="widget-title">功能</h3>
                <ul>
                    <li><a href="/blog/login">登录</a></li>
                </ul>
                </aside>		
            </div><!-- #secondary .widget-area -->

        </div><!-- #main -->


