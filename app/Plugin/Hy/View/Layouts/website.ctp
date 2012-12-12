<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <meta name="keywords" content="<?=Configure::read('Meta.keywords')?>"/> 
        <meta name="description" content="<?=Configure::read('Meta.description')?>"/> 
        <title>H&amp;Y - <?php echo $title_for_layout; ?></title>
        <?php 
        echo $this->Html->meta('icon', '/hy/img/favicon.ico');
        echo $this->Html->script(array('jquery/jquery-1.8.0.min', 'jquery/jquery.SuperSlide','zebra_dialog/zebra_dialog'));
        echo $this->Html->css(array('/hy/css/style.css?ver=1.0.0', 'zebra_dialog/zebra_dialog'));

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
    <div class="top">
        <div class="lan"><a href="/en">English</a></div>
        <div class="menu">
            <li><?php echo $this->action=='index'?'<span><span>首頁</span></span>':'<a href="/zh"><span>首頁</span></a>'?></li>
            <li><?php echo $this->action=='intro'?'<span><span>公司概况</span></span>':'<a href="/zh/intro"><span>公司概况</span></a>'?></li>
            <li><?php echo $this->action=='product'?'<span><span>產品展示</span></span>':'<a href="/zh/product"><span>產品展示</span></a>'?></li>
            <li><?php echo $this->action=='news'?'<span><span>新聞中心</span></span>':'<a href="/zh/news"><span>新聞中心</span></a>'?></li>
            <li><?php echo $this->action=='service'?'<span><span>客服中心</span></span>':'<a href="/zh/service"><span>客服中心</span></a>'?></li>
            <li><?php echo $this->action=='knowledge'?'<span><span>專業知識</span></span>':'<a href="/zh/knowledge"><span>專業知識</span></a>'?></li>
            <li><?php echo $this->action=='contact'?'<span><span>聯繫我們</span></span>':'<a href="/zh/contact"><span>聯繫我們</span></a>'?></li>
        </div>
    </div>

    <?php echo $this->Session->flash(); ?>
    <?php echo $content_for_layout; ?>

    <div class="bottombg">
        <div class="bottommenu"><a href="cabout.html">公司概況</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="cproducts.html">產品展示</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="cnews.html">新聞中心</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="ckefu.html">客服中心</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="czhuanye.html">專業知識</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="clianxi.html">聯繫我們</a></div>
        <div class="bottomcopyright">Copyright H&Y<br />Tel:028-12345678   123456789<br />
            Address:成都市</div>
    </div>
</body>
</html>

<?php echo $this->element('sql_dump'); ?>
