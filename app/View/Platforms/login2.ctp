<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="login" lang="en">
<head>
<?php echo $html->charset(); ?>
<title><?php echo Configure::read('Site.title');?></title>
        <link rel="stylesheet" href="/slypzx/css/screen.css" type="text/css" media="screen, projection">
		<link type="text/css" rel="stylesheet" href="/css/validatorTidyMode.css" />

		<script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
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
    <body class="">
        <div id="header">
            <div class="container">
                <div align="center"><img src="/slypzx/img/logo2.png" width="300" height="151" /><br>
              </div>
            </div>
        </div>
        <div id="content">
            <div class="container">
                <?php echo $form->create('User', array('url' => '/users/login', 'onsubmit' => "return $.formValidator.pageIsValid(1)"));?>
                    <div class="header field">
                        <h1>双流研培中心网站后台管理</h1>
                    </div>
                    <div class="field">
                        <label for="id_username">用户名</label>
                        <input name="data[User][login_name]" maxlength="75" autocapitalize="off" autocorrect="off" class="required" id="UserLoginName" type="text">
                    </div>
                    <div class="field">
                        <label for="id_password">口令</label>
                        <input name="data[User][password]" id="UserPassword" type="password">
                    </div>
                    <div class="field">
					    <?php echo $session->flash(); ?>
                        <input class="green_button" value="登录" type="submit">
                    </div>
                <?php echo $form->end();?>
            </div>
        </div>
    </body>
</html>
