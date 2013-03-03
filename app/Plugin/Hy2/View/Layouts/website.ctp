<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <meta name="keywords" content="<?=Configure::read('Meta.keywords')?>"/> 
        <meta name="description" content="<?=Configure::read('Meta.description')?>"/> 
        <title>H&amp;Y - <?php echo $title_for_layout; ?></title>
        <?php 
        echo $this->Html->meta('icon', '/hy/img/favicon.ico');
        echo $this->Html->script(array('jquery/jquery-1.8.0.min', 'jquery/jquery.SuperSlide','zebra_dialog/zebra_dialog', 'jquery/jquery.colorbox-min','jquery/jquery.slides'));
        echo $this->Html->css(array('/hy2/css/style.css?ver=1.0.0', 'zebra_dialog/zebra_dialog', 'colorbox', 'common'));

        echo $scripts_for_layout;

        echo $this->element('google-analytics'); 
        ?>

        <script type="text/javascript">
            $(document).ready(function(){
                //信息提示显示
                if ( $('#flashMessage').text() != '') {
                    new $.Zebra_Dialog($('#flashMessage').text(), {
                        'buttons':  false,
                        'modal': true,
                        'auto_close': 2000
                    });
                    $('#flashMessage').text("");
                }
                if ( $('#authMessage').text() != '') {
                    new $.Zebra_Dialog($('#authMessage').text(), {
                        'buttons':  false,
                        'modal': true,
                        'auto_close': 1500
                    });
                    $('#authMessage').text("");
                }
            });
        </script>

        <!--[if IE 6]>
        <script type="text/javascript" src="/js/DD_belatedPNG.js" ></script>
        <script type="text/javascript">
            $(window).load(function() { 
        DD_belatedPNG.fix('*');
        });
    </script>
    <![endif]-->
</head>

<body>



    <div class="topBG">
        <div class="topin">
            <div class="language fontsong shadow"><font style="color:#495f72">中文</font> | <a href="#">ENGLISH</a></div>
            <ul class="menu">
                <li class="no_sub"><a href="/" class="tablink nosub">首頁</a></li>
                <li><a href="/zh/product" class="tablink">產品</a>
                <ul>
                    <div class="lists">
                        <div class="pics"><a href=""><img src="/hy2/img/100.png" border="0" width="132" height="96" /></a></div>
                        <div class="words fontsong"><b style="padding-bottom:5px;clear:both;"><a href="">微型投影儀</a></b><br />
                        </div>
                    </div>
                    <div class="lists">
                        <div class="pics"><a href=""><img src="/hy2/img/200.png" border="0" width="132" height="96" /></a></div>
                        <div class="words fontsong"><b style="padding-bottom:5px;clear:both;"><a href="">攝影濾鏡</a></b><br />
                            <a href="/zh/product#1">可調式減光鏡</a><br />
                            <a href="/zh/product#2">多層鍍膜UV鏡</a><br />
                            <a href="/zh/product#3">偏光鏡減光鏡ND</a><br />
                            <a href="/zh/product#4">中灰漸變鏡</a><br />
                            <a href="/zh/product#5">紅外線截止濾鏡</a><br />
							<a href="/zh/product#6">多功能UV保護鏡</a><br />
                        </div>
                    </div>
                    <div class="lists">
                        <div class="pics"><a href=""><img src="/hy2/img/300.png" border="0" width="132" height="96" /></a></div>
                        <div class="words fontsong"><b style="padding-bottom:5px;clear:both;"><a href="">玻璃貼膜</a></b><br />
                        </div>
                    </div>
                </ul>
                </li>
                <li class="no_sub"><a target="_blank" href="http://hyfilter.taobao.com/" class="tablink nosub">在線商城</a></li>
                <li class="no_sub"><a href="/zh/about" class="tablink nosub">關於H&amp;Y</a></li>
                <li class="no_sub"><a href="/zh/cooperation" class="tablink nosub">商業合作</a></li>
                <li class="no_sub"><a href="/zh/news" class="tablink nosub">新聞活動</a></li>
                <li class="no_sub"><a href="/zh/contact_us" class="tablink nosub">聯繫我們</a></li>
            </ul>
        </div>
    </div>

    <?php echo $this->Session->flash(); ?>
    <?php echo $content_for_layout; ?>

    <div class="pagebottom">
        <div class="nav">
            <ul>
                <li><a href="">首頁</a></li>
                <li><a href="">產品</a></li>
                <li><a href="">在線商城</a></li>
                <li><a href="">關於H&amp;Y</a></li>
                <li><a href="">招商加盟</a></li>
                <li><a href="">新聞活動</a></li>
                <li><a href="">聯繫我們</a></li>
            </ul>
        </div>
        <div class="seclist fontsong">
            <div class="lists">

            </div>
            <div class="lists">
                <div class="first"><a href="">攝影濾鏡</a></div>
                <div class="sec">
                    <a href="">UV濾鏡（UV）</a><br />
                    <a href="">偏振鏡 （CPL）</a><br />
                    <a href="">灰度鏡 （ND）</a><br />
                    <a href="">可調/漸變灰度鏡(Adjustable ND)</a><br />
                </div>
                <div class="first"><a href="">微型投影儀</a></div>
                <div class="first"><a href="">玻璃貼膜</a></div>
                <div class="first"><a href="">方片</a></div>
            </div>
            <div class="lists">

            </div>
            <div class="lists">

            </div>
            <div class="lists">

            </div>
            <div class="lists">
                <div class="first"><a href="">參展活動</a></div>
                <div class="first"><a href="">企業新聞</a></div>
                <div class="first"><a href="">線下活動</a></div>
            </div>
            <div class="lists">

            </div>
            <div class="searchshow">
                <form action="" method="post">
                    <div class="searchleft"></div>
                    <div class="serachbg">
                        <input type="text" name="keywords" class="searchinput" />
                    </div>
                    <div class="serachright">
                        <input type="submit" class="searchbutton" value="" />
                    </div>
                </form>
            </div>
        </div>

        <div class="copyright">Copyright &copy; 2007 - 2013 H&amp;Y 版權所有粵ICP備100000000號</div>
    </div>
	
</div>

</body>
</html>

<?php echo $this->element('sql_dump'); ?>
