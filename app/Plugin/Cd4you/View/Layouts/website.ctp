<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <meta name="keywords" content="<?=Configure::read('Meta.keywords')?>"/> 
        <meta name="description" content="<?=Configure::read('Meta.description')?>"/> 
        <title>成都市第四幼儿园|成都四幼 - <?php echo $title_for_layout; ?></title>
        <?php 
        echo $this->Html->meta('icon', '/cd4you/img/favicon.ico');
        echo $this->Html->script(array('jquery/jquery-1.8.0.min', 'jquery/jquery.SuperSlide','zebra_dialog/zebra_dialog', 'jquery/jquery.colorbox-min', 'jquery/loopedslider.min', '/cd4you/js/focus', 'flash'));
        echo $this->Html->css(array('/cd4you/css/layout.css?ver=1.0.0', '/cd4you/css/style.css?ver=1.0.0','/cd4you/css/font.css?ver=1.0.0', 'zebra_dialog/zebra_dialog', 'colorbox', 'common'));

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
    <div id="top_box">
        <div class="box_left"><img src="/cd4you/img/index/index_02.png" /></div>
        <form>
            <div class="search">
                <div class="box_right"><a href="#"><img src="/cd4you/img/index/index_05.png" border="0" /></a></div>
                <div class="search_box">
                    <input name="sousuo" class="search_input" type="text" />
                </div>
            </div>
        </form>
    </div>
    <!---动画与导航start--->

    <div class="header" >
        <div class="flash">
            <script type="text/javascript" language="JavaScript">swf('/cd4you/img/index/br.swf','1073','178');</script>
        </div>
        <div class="nav_top">
            <a href="/" target="_self" class="navfont">首页</a>
            <a href="/app/page/3" target="_self" class="navfont">走进四幼</a>
            <a href="/app/page/4" target="_self" class="navfont">新闻播报</a>
            <a href="/app/page/5" target="_self" class="navfont">校园公告</a>
            <a href="/app/page/6" target="_self" class="navfont">家园共育</a>
            <a href="/app/page/7" target="_self" class="navfont">教研科研</a>
            <a href="/app/page/8" target="_self" class="navfont">特色活动</a>
            <a href="/app/blog" target="_self" class="navfont">温馨班级</a>
            <a href="/app/page/10" target="_self" class="navfont">早教中心</a>
            <a href="/app/page/11" target="_self" class="navfont">集团建设</a>
            <a href="/app/page/12" target="_self" class="navfont">资源共享</a>
            <a href="/app/page/13" target="_self" class="navfont">精彩视频</a>
            <a href="/app/page/14" target="_self" class="navfont">营养健康</a>
        </div>
    </div>
    <!---动画与导航end--->

    <div class="content content_listtow">
        <?php echo $this->Session->flash(); ?>
        <?php echo $content_for_layout; ?>

        <div class="pt"><img src="/cd4you/img/index/index_28a.png"  border="0"/></div>
        <div class="footer">
            <p><a class="endfont">地址:成都市茶店子育苗路4号    电话:86-028-87521419   邮编:610036<br />
            </a><a class="endfont">Copyright &copy; 2007-2013 成都市第四幼儿园版权所有 蜀ICP备07000521号</a> </p>
        </div>
    </div>
</body>
</html>

<?php echo $this->element('sql_dump'); ?>
