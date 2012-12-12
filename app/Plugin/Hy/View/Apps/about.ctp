<div class="flash" style="border:1px dotted #ccc;"><img src="/hy/img/cabout_title.jpg" /></div>
<div class="outdiv">
    <div class="inpageleft">
        <?php echo $page==301?'<span>公司簡介</span>':'<a href="/zh/about/301">公司簡介</a>'?>
        <?php echo $page==302?'<span>企業文化</span>':'<a href="/zh/about/302">企業文化</a>'?>
        <?php echo $page==303?'<span>榮譽資質</span>':'<a href="/zh/about/303">榮譽資質</a>'?>
    </div>

    <div class="inpageright">
        <div class="titlebg">
            <div class="titleleft">
                <div class="titleright">
                    <div class="titlewords"><span class="blue"><?php echo $title_for_content?></span></div>
                </div>
            </div>
        </div>
        <div class="rightcontent">
            <img src="/hy/img/about_pic.jpg" align="right" />
            <?php echo $this->element($page); ?>
        </div>
    </div>
</div>
