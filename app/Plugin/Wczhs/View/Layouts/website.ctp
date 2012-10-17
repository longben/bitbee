<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>

        <meta name="keywords" content="<?=Configure::read('Meta.keywords')?>"/> 
        <meta name="description" content="<?=Configure::read('Meta.description')?>"/> 
        <title>五彩智慧树早教机构 - <?php echo $title_for_layout; ?></title>
        <?php //echo $this->element('google-analytics'); ?>
        <?php
        echo $this->Html->meta('icon', '/wczhs/img/favicon.ico');
        echo $this->Html->script(array('jquery/jquery-1.8.0.min', 'zebra_dialog/zebra_dialog'));
        echo $this->Html->css(array('/wczhs/css/style.css?ver=1.0.2', 'zebra_dialog/zebra_dialog'));
        echo $scripts_for_layout;
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
	
	
	
	
<style>
.main_head {
BACKGROUND: url(/wczhs/img/img3-5_2.png) no-repeat
}
* HTML .main_head {
FILTER: progid:DXImageTransform.Microsoft.AlphaImageLoader(src="/wczhs/img/img3-5_2.png",sizingMethod='crop'); BACKGROUND: none transparent scroll repeat 0% 0%
}
* + HTML .main_head {
BACKGROUND: url(/wczhs/img/img3-5_2.png) no-repeat
}
.info {
PADDING-BOTTOM: 10px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; BACKGROUND: url(/wczhs/img/img3-5_3.png) repeat-y; PADDING-TOP: 5px
}
* HTML .info {
FILTER: progid:DXImageTransform.Microsoft.AlphaImageLoader(src="/wczhs/img/img3-5_3.png",sizingMethod='crop'); BACKGROUND-REPEAT: repeat-y
}
* + HTML .info {
PADDING-BOTTOM: 10px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; BACKGROUND: url(/wczhs/img/img3-5_3.png) repeat-y; PADDING-TOP: 5px
}
.down_kefu {
WIDTH: 157px; BACKGROUND: url(/wczhs/img/img3-5_4.png) no-repeat; HEIGHT: 8px
}
* HTML .down_kefu {
FILTER: progid:DXImageTransform.Microsoft.AlphaImageLoader(src="/wczhs/img/img3-5_4.png",sizingMethod='crop'); WIDTH: 157px; BACKGROUND-REPEAT: repeat-y; HEIGHT: 8px
}
* + HTML .down_kefu {
WIDTH: 157px; BACKGROUND: url(/wczhs/img/img3-5_4.png) no-repeat; HEIGHT: 8px
}
.Obtn {
WIDTH: 32px;
BACKGROUND: url(/wczhs/img/img3-5_1.png) no-repeat;
FLOAT: left;
HEIGHT: 139px;
MARGIN-LEFT: -5px
}
* HTML .Obtn {
FILTER: progid:DXImageTransform.Microsoft.AlphaImageLoader(src="/wczhs/img/img3-5_1.png",sizingMethod='crop'); WIDTH: 32px; BACKGROUND: none transparent scroll repeat 0% 0%; FLOAT: left; HEIGHT: 139px
}
* + HTML .Obtn {
MARGIN-TOP: 104px; WIDTH: 32px; BACKGROUND: url(/wczhs/img/img3-5_1.png) no-repeat; FLOAT: left; HEIGHT: 139px; MARGIN-LEFT: -5px
}
.qqtable SPAN {
PADDING-BOTTOM: 5px; LINE-HEIGHT: 20px; PADDING-LEFT: 0px; WIDTH: 100px; PADDING-RIGHT: 0px; COLOR: #ff6600; FONT-SIZE: 13px; FONT-WEIGHT: bold; PADDING-TOP: 5px
}
.qqtable A {
TEXT-DECORATION: none
}
.qqtable A:hover {
TEXT-DECORATION: none
}
.qun {
BORDER-BOTTOM: #ffd2bf 1px solid; BORDER-LEFT: #ffd2bf 1px solid; PADDING-BOTTOM: 5px; LINE-HEIGHT: 20px; BACKGROUND-COLOR: #ffffff; PADDING-LEFT: 0px; WIDTH: 100px; PADDING-RIGHT: 0px; FONT-SIZE: 12px; BORDER-TOP: #ffd2bf 1px solid; BORDER-RIGHT: #ffd2bf 1px solid; PADDING-TOP: 5px
}
.qun SPAN {
COLOR: #ff6600; FONT-SIZE: 13px; FONT-WEIGHT: bold
}
</style>

</head>

<body>


<DIV id=xixi onmouseover=toBig() onmouseout=toSmall() style="display:none;">
<TABLE style="FLOAT: left" border=0 cellSpacing=0 cellPadding=0 width=157>
<TR>
<TD class=main_head height=39 vAlign=top> </TD></TR>
<TR>
<TD class=info vAlign=top>
<TABLE class=qqtable border=0 cellSpacing=0 cellPadding=0 width=90 align=center>

<TR>
<TD align=center><B>早教咨询</B></TD>
</TR>
<TR>
<TD height=3></TD>
</TR>
<TR>
	<TD  align=center><a href='tencent://message/?uin=836641313' title='晴晴老师'><img src='http://wpa.qq.com/pa?p=1:836641313:46' border='0'></a></TD>
</TR>
<TD height=3></TD></TR>
<TR>
<TD height=10></TD>
</TR>
<TD align=center><B>招商加盟</B></TD>
</TR>
<TR>
<TD height=3></TD>
</TR>
<TR>
<TD  align=center><a href='tencent://message/?uin=496082631' title='方园长'><img src='http://wpa.qq.com/pa?p=1:496082631:46' border='0'></a></TD>
</TR>
<TD height=3></TD>
</TR>
</TR>

</TABLE>
</TD>
</TR>
<TR>
<TD class=down_kefu vAlign=top></TD>
</TR>
</TABLE>
<DIV class=Obtn></DIV></DIV>
<SCRIPT language=javascript>
onlineqq=function (id,_top,_left){
var me=id.charAt?document.getElementById(id):id, d1=document.body, d2=document.documentElement;
d1.style.height=d2.style.height='100%';me.style.top=_top?_top+'px':0;me.style.left=_left+"px";//[(_left>0?'left':'left')]=_left?Math.abs(_left)+'px':0;
me.style.position='absolute';
setInterval(function (){me.style.top=parseInt(me.style.top)+(Math.max(d1.scrollTop,d2.scrollTop)+_top-parseInt(me.style.top))*0.1+'px';},10+parseInt(Math.random()*20));
setTimeout(document.getElementById("xixi").style.display="",2000);
return arguments.callee;
};
window.onload=function (){
onlineqq
('xixi',100,-152)
};
</SCRIPT>
<SCRIPT language=javascript>
lastScrollY=0;
var InterTime = 1;
var maxWidth=-1;
var minWidth=-152;
var numInter = 8;
var BigInter ;
var SmallInter ;
var o =  document.getElementById("xixi");
var i = parseInt(o.style.left);
function Big()
{
if(parseInt(o.style.left)<maxWidth)
{
i = parseInt(o.style.left);
i += numInter;
o.style.left=i+"px";
if(i==maxWidth)
clearInterval(BigInter);
}
}
function toBig()
{
clearInterval(SmallInter);
clearInterval(BigInter);
BigInter = setInterval(Big,InterTime);
}
function Small()
{
if(parseInt(o.style.left)>minWidth)
{ //liehuo.net
i = parseInt(o.style.left);
i -= numInter;
o.style.left=i+"px";
if(i==minWidth)
clearInterval(SmallInter);
}
}
function toSmall()
{
clearInterval(SmallInter);
clearInterval(BigInter);
SmallInter = setInterval(Small,InterTime);
}
</SCRIPT>


	
	
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
        <div class="bg"><a href="/app/main">首页</a><a href="/app/aboutus">关于我们</a><a href="/app/news">最新资讯</a><a href="/app/course">培训课程</a><a href="/app/student">学员天地</a><a href="/app/english">英语外教</a><a href="/app/joinus">加盟五彩智慧树</a><a href="/app/contact">联系我们</a><a href="/app/member">会员电子档案</a><a href="">五彩智慧树博客</a></div>
        <div class="right"></div>
    </div>

    <?php echo $this->Session->flash(); ?>
    <?php echo $content_for_layout; ?>

    <div class="copyright" style="margin-top:8px;"> <a href="/app/main">首页</a> | <a href="/app/aboutus">关于我们</a> | <a href="/app/news">最新资讯</a> | <a href="/app/course">培训课程</a> | <a href="/app/student">学员天地</a> | <a href="/app/english">英语外教</a> | <a href="/app/joinus">加盟五彩智慧树</a> | <a href="/app/contact">联系我们</a> | <a href="/app/member">会员电子档案</a> | <a href="">五彩智慧树博客</a><br />
        <span style="color:#009ED1">&copy;2010-2012 All Rights Reserved. 成都五彩智慧树文化传播有限公司 版权信息<br />
            咨询电话：15719473479  15882196132  85637352  地址：成都华阳缤纷广场二楼8号<br />
            公交：华阳1路、2A路、4B路到音乐广场站下车</span></div>
</body>
</html>
<?php echo $this->element('sql_dump'); ?>
