<?php  
    echo $this->Html->script(array('jquery/easyui/jquery.easyui.min' , 'jquery/easyui/locale/easyui-lang-zh_CN','formee/formee'), array('inline' => false));
    echo $this->Html->css(array('easyui/themes/metro/easyui', 'easyui/themes/icon','formee/formee-style', 'formee/formee-structure'), 'stylesheet', array('inline' => false));
?>

<div class="flashad" style="height:200px;">
    <img src="/wczhs/img/user_pic.jpg" />
</div>

<div class="inpage">
    <div class="bottombg">
        <div class="outdiv">
            <div class="leftcon">
                <div class="title">
                    <div class="bluepannel">
                        <div class="title">
                            <div class="left"><div class="right"><div class="titleuser"></div></div></div>
                        </div>
                    </div>
                </div>

                <div class="leftmenus">

                </div>
            </div>
            <div class="rightcon">
                <div class="inpagetitle">
                    <div class="left"><div class="right">会员电子档案</div></div>
                </div>
                <div class="inpagecontent">

                    <?php echo $this->Form->create('User', array('url' => '/app/login', 'class' => 'formee'));?>
                    <fieldset>
                        <legend>会员登录</legend>
                        <div class="grid-12-12">
                            <label for="id_username">用户名：</label>
                            <input name="data[User][user_login]" maxlength="75" autocapitalize="off" autocorrect="off" class="easyui-validatebox" required="1"  id="user_login" type="text">
                        </div>
                        <div class="grid-12-12">
                            <label for="id_password">密　码：</label>
                            <input name="data[User][user_pass]" id="UserPassword" type="password" class="easyui-validatebox" required="1" >
                        </div>
                        <div class="grid-2-12 right">
                            <?php echo $this->Session->flash(); echo $this->Session->flash('auth');?>
                            <input class="green_button" value="登录" type="submit">
                        </div>
                    </fieldset>
                    <?php echo $this->Form->end();?>

                </div>
            </div>
        </div>
        <div class="leftbottom">
            <div class="bluepannel">
                <div class="bottom">
                    <div class="left"><div class="right"></div></div>
                </div>
            </div>
        </div>
    </div>
</div>
