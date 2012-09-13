<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $html->charset(); ?>
<title><?php echo Configure::read('Site.title');?></title>
<style>
body{font-size:12px;margin:100px;}
td{font-size:12px;line-height:20px;}
.focuseover{background:#9DCC00;border:1px solid #85A0BD;width:178px;height:28px;padding-top:6px;font-weight:bold}
.focuseout{background:#E8FDFF;border:1px solid #85A0BD;width:178px;height:28px;padding-top:6px;font-weight:bold}
a{color:#666666;text-decoration:None;}
a:Hover{color:#ff0000;text-decoration:none;}
div.message {clear: both;color: #900;font-size: 140%;font-weight: bold;margin: 1em 0;}
</style>
<link type="text/css" rel="stylesheet" href="/css/validatorTidyMode.css" />

<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/js/formValidator.js"></script>
<script type="text/javascript" src="/js/formValidatorRegex.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	//$.formValidator.initConfig({onerror:function(){alert("校验没有通过，具体错误请看错误提示")}});
	$.formValidator.initConfig({autotip:false,tidymode:true,onerror:function(msg){alert(msg)}});
	$("#UserLoginName").formValidator({onshow:"请输入用户名",onfocus:"用户名不能为空",oncorrect:"用户名合法"}).inputValidator({min:1,onerror:"用户名不能为空,请确认"});
	$("#UserPassword").formValidator({onshow:"请输入密码",onfocus:"密码不能为空",oncorrect:"密码合法"}).inputValidator({min:1,onerror:"密码不能为空,请确认"});
	$("#UserCaptcha").formValidator({onshow:"请输入验证码",onfocus:"验证码不能为空",oncorrect:"验证码合法"}).inputValidator({min:1,onerror:"验证码不能为空,请确认"});
});
</script>
</head>

<body>
<?php echo $form->create('User', array('url' => '/users/login', 'onsubmit' => "return $.formValidator.pageIsValid(1)"));?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
  <td align="center">
  <table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
  <tr>
    <td style="font-size:14px"> </td>
	<td><img src="<?=$html->url('/img/platforms/login/login_top.jpg')?>"/></td>
	<td></td>
  </tr>
  <tr>
    <td style="background:url(<?=$html->url('/img/platforms/login/login_left.jpg')?>) top right no-repeat;padding-top:200px" width="423">
	<table border=0 cellpadding=0 cellspacing=0 width=100%>
	<tr>
	  <td align="center"><!--预留1--></td>
	  <td align="center"><!--预留2--></td>
	</tr>
	</table>
	</td>
	<td style="border-left:1px solid #ABABAB;border-right:1px solid #ABABAB" align=center width=371>
	<table border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td>用户名：</td>
	  <td>
	    <label for="UserLoginName"></label><input name="data[User][user_login]" type="text" style="background:#E8FDFF;border:1px solid #85A0BD;width:178px;height:28px;padding-top:6px;font-weight:bold" onFocus='this.style.backgroundColor="#fff"' onBlur='this.style.backgroundColor="#E8FDFF"' id="UserLoginName" />
	    <?php //echo $form->input('login_name', array('label' => '','style' => 'background:#E8FDFF;border:1px solid #85A0BD;width:178px;height:28px;padding-top:6px;font-weight:bold', "onMouseOver" => $focuseover, 'onMouseOut' => $focuseout));?>
	  </td>
	  <td></td>
	</tr>
	<tr>
	  <td height="10"></td>
	</tr>
	<tr>
	  <td>密　码：</td>
	  <td>
	    <label for="UserPassword"></label><input type="password" name="data[User][user_pass]" style="background:#E8FDFF;border:1px solid #85A0BD;width:178px;height:28px;padding-top:6px;font-weight:bold" onFocus='this.style.backgroundColor="#fff"' onBlur='this.style.backgroundColor="#E8FDFF"' id="UserPassword" />
	    <?php //echo $form->input('password', array('label' => '','style' => 'background:#E8FDFF;border:1px solid #85A0BD;width:178px;height:28px;padding-top:6px;font-weight:bold', 'onMouseOver' => 'this.className=focuseover', 'onMouseOut' => 'this.className=focuseout'));?>
	  </td>
	  <td><!--&nbsp;忘记密码了？--></td>
	</tr>
	<tr>
	  <td height="10"></td>
	</tr>
	<tr>
	  <td>验证码：</td>
	  <td>
	    <input name="data[User][captcha]" type="text" style="background:#E8FDFF;border:1px solid #85A0BD;width:100px;height:28px;padding-top:6px;font-weight:bold" onFocus='this.style.backgroundColor="#fff"' onBlur='this.style.backgroundColor="#E8FDFF"' id="UserCaptcha" maxlength="4"/>
	    <?php //echo $form->input('captcha', array('label' => '','style' => 'background:#E8FDFF;border:1px solid #85A0BD;width:100px;height:28px;padding-top:6px;font-weight:bold', 'onMouseOver' => 'this.className:focuseover', 'onMouseOut' => 'this.className:focuseout'));?>
	    <a href="/login" title="看不清楚吗？请点击更换验证图片"><img src="<?php echo $html->url('/platforms/captcha'); ?>" align="absmiddle" width="75px" height="38px" border="0" /></a>
	  </td>
	  <td align="left"></td>
	</tr>
	<tr>
	  <td height="10"></td>
	</tr>
    <!--
	<tr>
	  <td>版本：</td>
	  <td><select name=""></select></td>
	  <td></td>
	</tr>
	-->
	</table>
	<table border=0 cellpadding=0 celspacing=0 width=90% style="margin:5px">
	<tr>
	  <td align="center">
      <?php
	   //echo $form->checkbox('remember_me');
	   //echo $form->label('记住密码');
	  ?>
	  </td>
	</tr>
	</table>
	<table border=0 cellpadding=0 celspacing=0 width=90%>
	<tr>
	  <td align=center>
	    <input type="image" name="imageField" id="imageField" src="<?=$html->url('/img/platforms/login/button_login.jpg')?>"/>
	  </td>
	</tr>
	<tr>
	  <td align=center style="color:#ff0000">
        <?php echo $session->flash(); ?>
	  </td>
	</tr>
	</table>
	</td>
	<td><img src="<?=$html->url('/img/platforms/login/login_right.jpg')?>"/></td>
  </tr>
  <tr>
    <td></td>
	<td><img src="<?=$html->url('/img/platforms/login/login_bottom.jpg')?>"/></td>
	<td></td>
  </tr>
  </table>
  <?php echo $form->end();?>
  <table border=0 cellpadding=0 cellspacing=0 width=830 align=center height=5 bgcolor="#D6F2FE" style="margin-top:6px">
<tr>
  <td></td>
</tr>
</table>
<table border=0 cellpadding=5 cellspacing=0 width=100%>
<tr>
  <td align=center><!--联系我们 | 比特比工作室&copy;&nbsp;版权所有--></td>
</tr>
</table>
  </td>
</tr>
</table>
<script type="text/javascript">
if (top!= self){
	if (location){
		top.location.replace("<?=$html->url('/platforms/login')?>");
	}else{
		top.document.location.replace("<?=$html->url('/platforms/login')?>");
	}
}
</script>

</body>
</html>
