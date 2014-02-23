<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <meta name="keywords" content="<?=Configure::read('Meta.keywords')?>"/>
        <meta name="description" content="<?=Configure::read('Meta.description')?>"/>
        <title>成都市金牛区机关第三幼儿园|成都三幼|机关三幼|成都市市级机关第三幼儿园 - <?php echo $title_for_layout; ?></title>
        <?php
        echo $this->Html->meta('icon', '/jg3you/img/favicon.ico');
        echo $this->Html->script(array('jquery/jquery-1.7.2.min', 'zebra_dialog/zebra_dialog', 'jquery/jquery.colorbox-min', 'jquery/loopedslider.min', 'jquery/jquery.scrollLoading-min','flash'));
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

                $('.scrollLoading').scrollLoading();
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
        <div>
            <form method="post" action="/app/search" name="sou" id="sou">
                <div class="searchbox">
                    <span>
                        <input name="keywords" type="text" id="search" class="easyui-validatebox" required="1"/>
                    </span>
                    <div class="left"><a href="javascript:$('#sou').submit()"><img src="/jg3you/img/search_04.gif" width="45" height="30" border="0" /></a></div>
                </div>
            </form>
        </div>
        <div class="flashbox"><script type="text/javascript" language="JavaScript">swf('/jg3you/img/head.swf','950','180');</script></div>
    </div>

    <!--横向导航-->
    <div id="nav">
        <div class="left"><a href="/"><img src="/jg3you/img/index_04.png" width="56" height="83" border="0" /></a></div>
        <div class="left"><a href="/app/page/3" target="_self"><img src="/jg3you/img/index_05.png" width="88" height="83" border="0" /></a></div>
        <div class="left"><a href="/app/page/4" target="_self"><img src="/jg3you/img/index_06.png" width="88" height="83" border="0"/></a></div>
        <div class="left"><a href="/app/page/5" target="_self"><img src="/jg3you/img/index_07.png" width="107" height="83" border="0"/></a></div>
        <div class="left"><a href="/app/page/6" target="_self"><img src="/jg3you/img/index_08.png" width="89" height="83" border="0"/></a></div>
        <div class="left"><a href="/app/page/7" target="_self"><img src="/jg3you/img/index_09.png" width="88" height="83" border="0"/></a></div>
        <div class="left"><a href="/app/page/8" target="_self"><img src="/jg3you/img/index_10.png" width="88" height="83" border="0"/></a></div>
        <div class="left"><a href="/app/page/9" target="_self"><img src="/jg3you/img/index_11.png" width="88" height="83" border="0"/></a></div>
    </div>


    <?php echo $this->Session->flash(); ?>
    <?php echo $content_for_layout; ?>

    <div class="ct"><img src="/jg3you/img/index_24.png" width="950" height="121" border="0" /></div>
    <div id="footer">
        <div id="link">
            <form name="form" id="form">
                <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)" >
                    <?php foreach($links as $link):?>
                    <option value="<?=$link['Attachment']['url']?>"><?=$link['Attachment']['name']?></option>
                    <?php endforeach;?>
                </select>
            </form>
        </div>
        <div class="jishuqi"><?php echo $counter;?></div>
    </div>
</body>
</html>

<?php echo $this->element('sql_dump'); ?>
