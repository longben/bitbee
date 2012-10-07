<?php  
    echo $this->Html->script(array('jquery/easyui/jquery.easyui.min' , 'jquery/easyui/locale/easyui-lang-zh_CN','formee/formee'), array('inline' => false));
    echo $this->Html->css(array('easyui/themes/gray/easyui', 'easyui/themes/icon','formee/formee-style', 'formee/formee-structure'), 'stylesheet', array('inline' => false));
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
                    <a href="/app/member/files">亲子本档案</a>
                    <a href="/app/member/record">生活点滴记录</a>
                    <a href="/app/logout">安全退出</a>
                </div>
            </div>
            <div class="rightcon">
                <div class="inpagetitle">
                    <div class="left"><div class="right">会员电子档案</div></div>
                </div>
                <div class="inpagecontent">
                    <?php
                    echo $this->element($page)
                    ?>
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
