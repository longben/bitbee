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