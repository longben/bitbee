<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->Html->charset(); ?>
<meta name="keywords" content="<?=Configure::read('Meta.keywords')?>"/>
<meta name="description" content="<?=Configure::read('Meta.description')?>"/>
<title>成都市解放北路小学 - <?php echo $title_for_layout; ?></title>
<?php
echo $this->Html->meta('icon', '/jbyx/img/favicon.ico');
echo $this->Html->script(array('jquery/jquery-1.7.2.min', 'zebra_dialog/zebra_dialog', 'jquery/jquery.colorbox-min', 'jquery/loopedslider.min', 'flash'));
echo $this->Html->css(array('/jbyx/css/style.css?ver=1.0.0', 'zebra_dialog/zebra_dialog', 'colorbox', 'common'));

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
<div class="header">
  <div id="top1">
    <div id="mail"><a href="#">校长信箱</a></div>
    <div id="search">
      <form>
        <input name="quanzhan" id="quanzhan"type="text" />
        <span id="ss">搜索</span>
      </form>
    </div>
  </div>
  <div class="flash">
    <script type="text/javascript" language="JavaScript">swf('/jbyx/img/top.swf','950','247');</script>
  </div>
  <div class="nav">
    <span id="home"><a href="/" target="_self" class="style3">首 页</a></span>
    <a href="/app/page/3" target="_self" class="style2">学校概况</a>
    <a href="/app/page/4" target="_self" class="style2">校务公开</a>
    <a href="/app/page/5" target="_self" class="style2">校园新闻</a>
    <a href="/app/page/6" target="_self" class="style2">德育专栏</a>
    <a href="/app/page/7" target="_self" class="style2">教学科研</a>
    <a href="/app/page/8" target="_self" class="style2">办学特色</a>
    <a href="/app/page/9" target="_self" class="style2">学生乐园</a>
    <a href="/app/page/10" target="_self" class="style2">家长互动</a>
    <a href="/app/page/11" target="_self" class="style2">教育资源</a>
    <a href="/app/page/13" target="_self" class="style2">温馨班级</a>
  </div>
</div>

  <?php echo $this->Session->flash(); ?>
  <?php echo $content_for_layout; ?>

  <div class="yqlink">
    <form>
      <span>
        <select name="xxbk" class="xxbk">
          <option>- - -学校博客- - -</option>
        </select>
      </span><span>
        <select name="xxbk" class="xxbk">
          <option>- - -我校上央视- - -</option>
        </select>
      </span><span>
        <select name="xxbk" class="xxbk">
          <option>- - -心理咨询- - -</option>
        </select>
      </span>
    </form>
  </div>
  <div class="footer">Copyright 2006-2014 成都解放北路第一小学版权所有</div>
  <!--
  <?php echo $this->element('sql_dump'); ?>
  -->
  </body>
  </html>
