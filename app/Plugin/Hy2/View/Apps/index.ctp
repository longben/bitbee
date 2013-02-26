<div id="warp">
    <script>
        //保证导航栏背景与图片轮播背景一起显示
        $("#mainbody").removeClass();
        $("#mainbody").addClass("index_bg05");
    </script>
    <script>
        $(function(){
            //滚动Banner图片的显示
            $('#slides').slides({
                preload: false,
                preloadImage: '/hy2/img/loading.gif',
                effect: 'fade',
                slideSpeed: 400,
                fadeSpeed: 100,
                play: 3000,
                pause: 100,
                hoverPause: true
            });
            $('#js-news').ticker();
        });
    </script>
    <div class="bannerbg indexbanner" id="slides">
        <div class="bannerImg">
            <div class="slides_container">
                <div id="banner_pic_1"><img src="/hy2/img/index_bg.png"></div>
            </div>
        </div>
    </div>
</div>

<div class="indexcon">
    <div class="inpage">
        <div class="indexin indexleft">
            <div class="sinatitle"><div class="jiagz"><a href="" title="加关注"></a></div></div>
            <div class="wordsintro">
                <font class="titles">智慧人生，購相機產品，火熱...</font><br />
                提起秋天，總會令人聯想到遍野的樹木變成黃紅色的畫面。但在香港的掛在樹上的黃、紅色樹葉一般只有幾片，很多樹木長年都是青綠色的..
            </div>
            <div class="wordsintro">
                <font class="titles">光影全網分享 創意大開眼界</font><br />
                在單反世界裏「大即是美」可謂是公認真理，所以全片幅是不少攝影愛好者的終極目標 ...
            </div>
            <div class="wordsintro">
                <font class="titles">心系天下 年度鉅獻</font><br />
                復古相機近年大有市場，而富士兩年前推出了APS-C 片幅的X100後，今日終於推出其後繼 X100S。新機單看型號看似只是小改款...
            </div>

            <div class="showad"><a href="http://hyfilter.taobao.com/" target="_blank"><img src="/hy2/img/onlinestore.jpg" border="0" /></a></div>
        </div>
        <div class="indexin indexright">
            <div class="titles">最新產品</div>
            <?php foreach($products as $p):?>
            <div class="pics">
                <div class="picshow">
                    <div class="img">
                        <a href="/zh/product_detail/<?=$p['Product']['id']?>" title="<?=$p['Product']['name']?>">
                            <img src="/upload/user/products/<?=$p['Product']['picture']?>" border="0" width="216" height="142" />
                        </a>
                    </div>
                    <div class="wordtitle"><a href="/zh/product_detail/<?=$p['Product']['id']?>"><?=$p['Product']['name']?></a></div>
                </div>
                <div class="picshadow"><img src="/hy2/img/pic_shadow.png" width="100%" /></div>
            </div>
            <?php endforeach;?>

        </div>
    </div>
    <div class="indexscroll">
        <div id="leftArry"></div>
        <div id="counts">

            <?php foreach($links as $cover):?>
            <div class="box">
                <div class="pics">
                    <a href="<?=$cover['Attachment']['url']?>" target="_blank">
                        <img src="/upload/user/images/<?=$cover['Attachment']['file_path']?>" width="190" height="95" alt="<?=$cover['Attachment']['name']?>"/>
                    </a>
                </div>
                <div class="shadow"><img src="/hy2/img/pic_shadow.png" width="100%" /></div>
            </div>
            <?php endforeach;?>

        </div>
        <div id="rightArry"></div>
    </div>
    <SCRIPT language=javascript type=text/javascript>
        <!--//--><![CDATA[//><!--
            var scrollPic_02 = new ScrollPic();
            scrollPic_02.scrollContId   = "counts"; //内容容器ID
            scrollPic_02.arrLeftId      = "leftArry";//左箭头ID
            scrollPic_02.arrRightId     = "rightArry"; //右箭头ID

            scrollPic_02.frameWidth     = 928;//显示框宽度
            scrollPic_02.pageWidth      = 232; //翻页宽度

            scrollPic_02.speed          = 10; //移动速度(单位毫秒，越小越快)
            scrollPic_02.space          = 10; //每次移动像素(单位px，越大越快)
            scrollPic_02.autoPlay       = true; //自动播放
            scrollPic_02.autoPlayTime   = 3; //自动播放间隔时间(秒)

            scrollPic_02.initialize(); //初始化

            //--><!]]>
        </SCRIPT>
