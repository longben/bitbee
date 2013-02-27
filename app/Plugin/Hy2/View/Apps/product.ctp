<script>
    $(function(){
        /*
        $('.secmenus').bind('mouseover',function(event){
            $("#showmenus .secmenus").attr("class","no secmenus")
            $(this).attr("class","over secmenus");
            $(".inthirdmenu").css("display","none");
            $("#thirdmenu"+$(this).attr("id").replace("menu","")).css("display","block");
        })
        */
    })
</script>

<div id="warp">
    <div class="bannerbg inpagebanner">
        <div class="bannersbg"></div>
    </div>
</div>

<div class="secpagecon">
    <div class="weizhi"><a href="">首頁</a> &gt; 產品列表</div>
    <div class="geline"></div>
    <div class="pagetitle shadow">產品</div>
    <div class="seconmenu">
        <div class="in" id="showmenus">
            <div class="over secmenus" id="menu1"><a href="">攝影濾鏡</a></div>
            <div class="no secmenus" id="menu2"><a href="javascript:;">微型投影儀</a></div>
            <div class="no secmenus" id="menu3"><a href="javascript:;">玻璃貼膜</a></div>
        </div>
    </div>


    <div class="thirdmenu">
        <div class="left"></div>
        <div class="in">
            <span id="thirdmenu1" class="inthirdmenu"><a href="">UV濾鏡(UV)</a><a href="">偏振鏡(CPL)</a><a href="">灰度鏡(ND)</a><a href="">方片</a></span>
            <span id="thirdmenu2" class="inthirdmenu"style="display:none"><a href="">UV濾鏡(UV)2</a><a href="">偏振鏡(CPL)</a><a href="">灰度鏡(ND)</a><a href="">方片</a></span>
            <span id="thirdmenu3" class="inthirdmenu"style="display:none;"><a href="">UV濾鏡(UV)3</a><a href="">偏振鏡(CPL)</a><a href="">灰度鏡(ND)</a><a href="">方片</a></span>
        </div>
        <div class="right"></div>

    </div>

    <?php foreach($codes as $code):?>
    <div class="prolisttitle"><?=$code['Code']['name']?></div>
    <div class="prolistpics">
        <?php $products = $this->requestAction('/hy2/products/findByCode/' . $code['Code']['id']);?>
        <?php foreach($products as $p):?>
        <div class="pics">
            <div class="picshow">
                <div class="img">
                    <a href="/zh/product_detail/<?=$p['Product']['id']?>" target="_blank" title="<?=$p['Product']['name']?>">
                        <img src="/upload/user/products/<?=$p['Product']['picture']?>" width="217" height="168" border="0" />
                    </a>
                </div>
                <div class="wordtitle"><a href="/zh/product_detail/<?=$p['Product']['id']?>" target="_blank"><?=$p['Product']['name']?></a></div>
            </div>
            <div class="picshadow"><img src="/hy2/img/pic_shadow.png" width="100%" /></div>
        </div>
        <?php endforeach;?>

    </div>
    <?php endforeach;?>

