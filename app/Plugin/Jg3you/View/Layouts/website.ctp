<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <meta name="keywords" content="<?=Configure::read('Meta.keywords')?>"/> 
        <meta name="description" content="<?=Configure::read('Meta.description')?>"/> 
        <title>成都市金牛区机关第三幼儿园|成都三幼|机关三幼|成都市市级机关第三幼儿园 - <?php echo $title_for_layout; ?></title>
        <?php 
        echo $this->Html->meta('icon', '/jg3you/img/favicon.ico');
        echo $this->Html->script(array('jquery/jquery-1.7.2.min', 'zebra_dialog/zebra_dialog', 'jquery/jquery.colorbox-min', 'jquery/loopedslider.min'));
        echo $this->Html->css(array('/jg3you/css/style.css?ver=1.0.0', 'zebra_dialog/zebra_dialog', 'colorbox', 'common'));

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
    <div id="top">
        <form>
            <div class="searchbox"><span>
                    <input name="search" type="text" id="search" />
                </span>
                <div class="left"><a href="#"><img src="/jg3you/img/search_04.gif" width="45" height="30" border="0" /></a></div>
            </div>
        </form>
    </div>
    <!--横向导航-->
    <div id="nav">
        <div class="left"><a href="/jg3you/apps/"><img src="/jg3you/img/index_04.png" width="56" height="83" border="0" /></a></div>
        <div class="left"><a href="/jg3you/apps/page/1" target="_self"><img src="/jg3you/img/index_05.png" width="88" height="83" border="0" /></a></div>
        <div class="left"><a href="info/xyfm.html" target="_self"><img src="/jg3you/img/index_06.png" width="88" height="83" border="0"/></a></div>
        <div class="left"><a href="info/jkydt.html" target="_self"><img src="/jg3you/img/index_07.png" width="107" height="83" border="0"/></a></div>
        <div class="left"><a href="info/jzkj.html" target="_self"><img src="/jg3you/img/index_08.png" width="89" height="83" border="0"/></a></div>
        <div class="left"><a href="info/chbb.html" target="_self"><img src="/jg3you/img/index_09.png" width="88" height="83" border="0"/></a></div>
        <div class="left"><a href="info/wsbj.html" target="_self"><img src="/jg3you/img/index_10.png" width="88" height="83" border="0"/></a></div>
        <div class="left"><a href="info/jyzy.html" target="_self"><img src="/jg3you/img/index_11.png" width="88" height="83" border="0"/></a></div>
    </div>


    <?php echo $this->Session->flash(); ?>
    <?php echo $content_for_layout; ?>


    <div class="ct"><img src="/jg3you/img/index_24.png" width="950" height="121" border="0" /></div>
    <div id="footer">
        <div id="link">
            <form name="form" id="form">
                <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)" >
                    <option value="#">友情连接1</option>
                    <option value="#">友情连接2</option>
                    <option value="#">友情连接3</option>
                </select>
            </form>
        </div>
    </div>
</body>
</html>

<?php echo $this->element('sql_dump'); ?>
