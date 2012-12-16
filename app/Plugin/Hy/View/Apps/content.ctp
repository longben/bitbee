<div class="flash" style="border:1px dotted #ccc;"><img src="/hy/img/cnews_title.jpg" /></div>
<div class="outdiv">
    <div class="inpageleft">
        <a href="/zh/news/501">公司新聞</a>
        <a href="/zh/news/502">行業動態</a>
    </div>

    <div class="inpageright">
        <div class="titlebg">
            <div class="titleleft">
                <div class="titleright">
                    <div class="titlewords" style="padding-top:15px;"><span class="blue"><?=$post['Post']['post_title']?></span></div>
                    <div class="titledate" style="padding-top:15px;"><?=date("Y-m-d",strtotime($post['Post']['post_date']))?></div>
                </div>
            </div>
        </div>
        <div class="rightcontent">
            <?php echo $post['Post']['post_content'];?>
        </div>

        <div align="center"><a href="javascript:window.close()"><img src='/img/close.jpg' border="0"/></a></div>
    </div>
</div>
