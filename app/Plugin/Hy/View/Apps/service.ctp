<div class="flash" style="border:1px dotted #ccc;"><img src="/hy/img/cservice_title.jpg" /></div>
<div class="outdiv">
    <div class="inpageleft">
        <?php echo $page==601?'<span>在線咨訊</span>':'<a href="/zh/service/601">在線咨訊</a>'?>
        <?php echo $page==602?'<span>代理商加盟</span>':'<a href="/zh/service/602">代理商加盟</a>'?>
        <?php echo $page==603?'<span>銷售網絡</span>':'<a href="/zh/service/603">銷售網絡</a>'?>
        <?php echo $page==604?'<span>信息反饋</span>':'<a href="/zh/service/604">信息反饋</a>'?>
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
            <?php echo $this->element($page); ?>
        </div>
    </div>

</div>

