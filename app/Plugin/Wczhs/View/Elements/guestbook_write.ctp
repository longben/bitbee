<?php
echo $this->Html->script(array('formValidator', 'formValidatorRegex'), array('inline' => false));
?>

<script type="text/javascript"> 
    $(document).ready(function(){
        //$.formValidator.initConfig({onerror:function(){alert("校验没有通过，具体错误请看错误提示")}});
        $.formValidator.initConfig({autotip:false,tidymode:true,onerror:function(msg){alert(msg)}});
        $("#username").formValidator({onshow:"请输入用户名",onfocus:"用户名不能为空",oncorrect:"用户名合法"}).inputValidator({min:1,onerror:"姓名不能为空,请确认"});
        $("#email").formValidator({onshow:"请输入密码",onfocus:"密码不能为空",oncorrect:"密码合法"}).inputValidator({min:1,onerror:"邮箱不能为空,请确认"});
        $("#content").formValidator({onshow:"请输入验证码",onfocus:"验证码不能为空",oncorrect:"验证码合法"}).inputValidator({min:1,onerror:"留言内容不能为空,请确认"});
    });
</script>


<div class="con">
    <div>■ 尊重网上道德，遵守<a href="http://goo.gl/Y4fMj" target="_blank"><font color=red>《全国人大常委会关于维护互联网安全的决定》</font></a>和<a href="http://goo.gl/r8Gku" target="_blank"><font color=red>《互联网电子公告服务管理规定》</font></a>及中华人民共和国其他各项有关法律法规。</div>
    <div>■ 严禁发表危害国家安全、损害国家利益、破坏民族团结、破坏国家宗教政策、破坏社会稳定、侮辱、诽谤、教唆、淫秽等内容 。</div>
    <div>■ 相同的内容请不要重复发送。</div>
    <div>■ 请注意：新留言必须等待管理员的处理之后才会显示在主页上。</div>
    <form name="form1" method="post" action="/guestbooks/add" onsubmit="return $.formValidator.pageIsValid(1);">
        <input type="hidden" name="data[Guestbook][message_type]" value="1" />
        <table class="contactInput" width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr height="15">
                <td width="30%"></td>
                <td width="70%"></td>
            </tr>
            <tr height="28">
                <td align="right">姓名：&nbsp;</td>
                <td><input name="data[Guestbook][username]" id="username" type="text" size="50" maxlength="30" class="input" /></td>
            </tr>
            <tr height="28">
                <td align="right">电话：&nbsp;</td>
                <td><input name="data[Guestbook][telephone]" id="telephone" type="text" size="50" maxlength="30" class="input" /></td>
            </tr>
            <tr height="28">
                <td align="right">邮箱：&nbsp;</td>
                <td><input name="data[Guestbook][email]"  id="email" type="text" size="50" maxlength="50" class="input" /></td>
            </tr>
            <tr>
                <td align="right">留言：&nbsp;</td>
                <td style="padding-top:5px;"><textarea name="data[Guestbook][content]" id="content" cols="52" rows="8" class="input"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td style="padding: 10px 0 40px 0;">
                    <input type="submit" value=" 提 交 " class="button" />
                    &nbsp;
                    <input type="reset" value=" 重 置 " class="button" />
                </td>
            </tr>
        </table>
    </form>
</div>
