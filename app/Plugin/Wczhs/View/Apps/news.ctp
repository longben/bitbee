<div class="flashad" style="height:200px;">
    <img src="/wczhs/img/news_pic.jpg" />
</div>

<div class="inpage">
    <div class="bottombg">
        <div class="outdiv">
            <div class="leftcon">
                <div class="title">
                    <div class="bluepannel">
                        <div class="title">
                            <div class="left"><div class="right"><div class="titlenews"></div></div></div>
                        </div>
                    </div>
                </div>

                <div class="leftmenus">
                    <a href="/app/news/401/培训动态">培训动态</a>
                    <a href="/app/news/402/行业动态">行业动态</a>
                    <a href="/app/news/403/最新活动">最新活动</a>
                </div>

            </div>
            <div class="rightcon">
                <div class="inpagetitle">
                    <div class="left"><div class="right"><?=urldecode($title)?></div></div>
                </div>
                <div class="inpagecontent">
                    <div class="newsList">
                        <?php foreach($news as $post):?>
                        <div class="lists">
                            <div class="left">
                                <a href="/app/content/<?=$post['Post']['id']?>" target="_blank"><?=$post['Post']['post_title']?></a>
                            </div>
                            <div class="right"><?=$post['Post']['post_date']?></div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div class="Pages">
                        <div class="paging">
                            <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
                            | 	<?php echo $this->Paginator->numbers();?>
                            |   <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="leftbottom">
            <div class="bluepannel">
                <div class="bottom">
                    <div class="left"><div class="right"></div></div>
                </div>
            </div>
        </div>
    </div>
</div>
