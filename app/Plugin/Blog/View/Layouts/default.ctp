<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" dir="ltr" lang="zh-CN">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" dir="ltr" lang="zh-CN">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" dir="ltr" lang="zh-CN">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html dir="ltr" lang="zh-CN">
<!--<![endif]-->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title><?php echo $user['Meta']['site_title'] . ' | ' . $user['Meta']['site_tagline']?></title>
    <link rel="stylesheet" type="text/css" media="all" href="/blog/css/style.css" />
    <!--[if lt IE 9]>
    <script src="/blog/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    <?php echo $this->Html->script(array('jquery/jquery-1.8.0.min', 'jquery/jquery.scrollLoading-min'));?>
</head>

<body class="<?=$myClass?>">
    <div id="page" class="hfeed">
        <header id="branding" role="banner">
        <hgroup>
        <h1 id="site-title"><span><a href="/blog/<?=$user['User']['id']?>" title="<?=$user['Meta']['site_title']?>" rel="home"><?php echo $user['Meta']['site_title']?></a></span></h1>
        <h2 id="site-description"><?php echo $user['Meta']['site_tagline']?></h2>
        </hgroup>

        <img src="<?php echo $header_img?>" width="1000" height="288" alt="" />

        <form method="get" id="searchform" action="/blog/<?=$user['User']['id']?>">
            <label for="s" class="assistive-text">Search</label>
            <input type="text" class="field" name="s" id="s" placeholder="搜索" />
            <input type="submit" class="submit" name="submit" id="searchsubmit" value="Search" />
        </form>

        <nav id="access" role="navigation">
        <h3 class="assistive-text">Main menu</h3>
        <div class="skip-link"><a class="assistive-text" href="#content" title="Skip to primary content">Skip to primary content</a></div>
        <div class="skip-link"><a class="assistive-text" href="#secondary" title="Skip to secondary content">Skip to secondary content</a></div>
        <div class="menu">
            <ul>
                <li class="current_page_item"><a href="/blog/<?=$user['User']['id']?>" title="首页">首页</a></li>
				<?php foreach($tags as $tag):?>
				<li class="page_item"><a href="/blog/<?=$user['User']['id']?>?tag=<?=$tag['Menu']['id']?>" title="<?=$tag['Menu']['name']?>"><?=$tag['Menu']['name']?></a></li>
				<?php endforeach;?>
            </ul>
        </div>
        </nav><!-- #access -->
        </header><!-- #branding -->

        <?php echo $this->Session->flash(); ?>
        <?php echo $content_for_layout; ?>
        

        <footer id="colophon" role="contentinfo">
        <div id="site-generator">
            <a href="#" title="" rel="generator">&copyCopyright 2010-2013 All Rights Reserved. 版权信息</a>
            <br/>欢迎您登录本站，您是本站第<strong><font color="red"><?=$user['Meta']['tweet_count']?></font></strong>位访问者
        </div>
        </footer><!-- #colophon -->
        
    </div><!-- #page -->

    <script type="text/javascript">
        $(document).ready(function(){
            //信息提示显示
            if ( $('#flashMessage').text() != '') {
                alert($('#flashMessage').text());
                $('#flashMessage').text("");
            }

            $('.scrollLoading').scrollLoading();
        });
    </script>



</body>
</html>
