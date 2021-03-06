<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>

        <meta name="keywords" content="<?=Configure::read('Meta.keywords')?>"/>
        <meta name="description" content="<?=Configure::read('Meta.description')?>"/>
        <title>五彩智慧树早教机构 - <?php echo $title_for_layout; ?></title>
        <?php
        echo $this->Html->meta('icon', '/wczhs/img/favicon.ico');

        echo $this->Html->script(array('jquery/jquery-1.8.0.min', 'zebra_dialog/zebra_dialog'));

        echo $this->Html->css(array('/wczhs/css/style.css?ver=1.0.5', 'zebra_dialog/zebra_dialog'));

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
    <div class="topall">
        <div class="topsmlmenu">
            <div class="left"></div>
            <div class="bg"><a href="/app/login">用户登录</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="">网站地图</a></div>
            <div class="right"></div>
        </div>
        <div class="topaddshow">咨询热线：028-85637352    15882196132</div>
        <div class="topphoneshow">地址：成都华阳缤纷广场二楼8号 E-Mail:496082631@qq.com</div>
    </div>
    <div class="topmenu">
        <div class="left"></div>
        <div class="bg"><a href="/app/main">首页</a><a href="/app/aboutus">五彩智慧树简介</a><a href="/app/news">早期教育</a><a href="/app/course">家长沙龙</a><a href="/app/student">新闻与活动</a><a href="/app/english">育儿知识</a><a href="/app/joinus">成长历程</a><a href="/app/contact">联系我们</a><a href="/app/member">会员电子档案</a><a href="/app/blog">五彩智慧树博客</a></div>
        <div class="right"></div>
    </div>

    <?php echo $this->Session->flash(); ?>
    <?php echo $content_for_layout; ?>

    <div class="copyright" style="margin-top:8px;"> <a href="/app/main">首页</a> | <a href="/app/aboutus">关于我们</a> | <a href="/app/news">最新资讯</a> | <a href="/app/course">培训课程</a> | <a href="/app/student">学员天地</a> | <a href="/app/english">英语外教</a> | <a href="/app/joinus">加盟五彩智慧树</a> | <a href="/app/contact">联系我们</a> | <a href="/app/member">会员电子档案</a> | <a href="">五彩智慧树博客</a><br />
        <span style="color:#009ED1">&copy;2010-2012 All Rights Reserved. 成都五彩智慧树文化传播有限公司 版权信息<br />
            咨询电话：15882196132  85637352  地址：成都华阳缤纷广场二楼8号<br />
            公交：华阳1路、2A路、4B路到缤纷广场站下车</span></div>
    <?php echo $this->element('qq'); ?>
</body>
</html>
<?php echo $this->element('sql_dump'); ?>
