<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
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

        <script type="text/javascript" src="/js/jquery/jquery-1.7.2.min.js"></script>

        <script type="text/javascript" src="/js/jquery/jquery.metadata.js"></script>
        <script type="text/javascript" src="/js/jquery/validation/jquery.validate.min.js"></script>
        <script type="text/javascript" src="/js/jquery/validation/localization/messages_cn.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                //$("#bbForm").validate();
                $("#bbForm").validate({
                    errorElement: "span",
                    errorPlacement: function(error, element) {
                        //error.appendTo(element.parent("div").children("label").children('em'));
                        error.appendTo($('#err'));
                    }      
                });
            });
        </script>
    </head>

    <body>
        <?php echo $this->Form->create('User', array('url' => $this->here, 'id' => "bbForm"));?>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td align="center">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="font-size:14px"> </td>
                            <td><img src="<?=$this->Html->url('/img/platforms/login/login_top.jpg')?>"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="background:url(<?=$this->Html->url('/img/platforms/login/login_left.jpg')?>) top right no-repeat;padding-top:200px" width="423">
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
                                            <?php echo $this->Form->input('user_login', array('class' => 'required', 'title' => '请输入你的帐号！<br/>','label' => '','style' => 'background:#E8FDFF;border:1px solid #85A0BD;width:178px;height:28px;padding-top:6px;font-weight:bold', "onFocus" => 'this.style.backgroundColor=\'#fff\'', 'onBlur' => 'this.style.backgroundColor=\'#E8FDFF\''));?>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td height="10"></td>
                                    </tr>
                                    <tr>
                                        <td>密　码：</td>
                                        <td>
                                            <?php echo $this->Form->password('user_pass', array('class' => 'required', 'title' => '请输入你的密码！','label' => '','style' => 'background:#E8FDFF;border:1px solid #85A0BD;width:178px;height:28px;padding-top:6px;font-weight:bold', 'onFocus' => 'this.style.backgroundColor=\'#fff\'', 'onBlur' => 'this.style.backgroundColor=\'#E8FDFF\''));?>
                                        </td>
                                        <td><!--&nbsp;忘记密码了？--></td>
                                    </tr>
                                    <tr>
                                        <td height="10"></td>
                                    </tr>
                                    <tr>
                                        <td>验证码：</td>
                                        <td>
                                            <?php echo $this->Form->input('captcha', array('class' => 'required', 'title' => '请输入验证码！','label' => '', 'div' => false ,'style' => 'background:#E8FDFF;border:1px solid #85A0BD;width:100px;height:28px;padding-top:6px;font-weight:bold', 'onFocus' => 'this.style.backgroundColor="#fff"', 'onBlur' => 'this.style.backgroundColor="#E8FDFF"', 'maxlength' => 4));?>
                                            <a href="/login" title="看不清楚吗？请点击更换验证图片"><img src="<?php echo $this->Html->url('/users/captcha'); ?>" align="top" width="75px" height="38px" border="0" /></a>
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

                                            <em></em>
                                <table border=0 cellpadding=0 celspacing=0 width=90% style="margin:5px">
                                    <tr>
                                        <td align="center">
                                            <?php
                                            //echo $this->Form->checkbox('remember_me');
                                            //echo $this->Form->label('记住密码');
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                                <table border=0 cellpadding=0 celspacing=0 width=90%>
                                    <tr>
                                        <td align=center>
                                            <input type="image" name="imageField" id="imageField" src="<?=$this->Html->url('/img/platforms/login/button_login.jpg')?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align=center style="color:#ff0000">
                                            <div id='err'></div>
                                            <?php echo $this->Session->flash(); echo $this->Session->flash('auth');?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td><img src="<?=$this->Html->url('/img/platforms/login/login_right.jpg')?>"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><img src="<?=$this->Html->url('/img/platforms/login/login_bottom.jpg')?>"/></td>
                            <td></td>
                        </tr>
                    </table>
                    <?php echo $this->Form->end();?>
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
    </body>
</html>
