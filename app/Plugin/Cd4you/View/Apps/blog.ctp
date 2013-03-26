<?php  
echo $this->Html->script(array('jquery/jquery.metro-btn'), array('inline' => false));
echo $this->Html->css(array('/cd4you/css/jq-metro/jq-metro'), 'stylesheet', array('inline' => false));
?>

<script type="text/javascript">
$(document).ready(function () {

    $("#metroaqui_novo").AddMetroDoubleWithTrailer('bt6', 'metro-azul', '/cd4you/css/jq-metro/admin.png', '成都四幼博客', '', 'metro-verde');
    //$("#metroaqui_novo").AddMetroDoubleWithTrailerWithBG('bt6', '/upload/user/avatar/default.jpg', '五彩智慧树', 'alert("Text");', 'metro-azul');

    <?php foreach($users as $i=>$user):?>
    <?php srand((double)microtime()*1000000);?>
    $("#metroaqui_novo").AddMetroSimpleButton('bt<?=$i?>', '<?=$cssStyle[array_rand($cssStyle)]?>', '/cd4you/img/blog_bg.png', '<?=$user['Meta']['site_title']?>', 'gotoUrl("/blog/<?=$user['User']['id']?>");');
    <?php endforeach;?>

});

function gotoUrl(url){
    window.location = url;
}
</script>
<div class="w950">
<div class="sidebar_left">
    <div class="column_name">温馨班级</div>
    <!---子菜单start--->
    <div class="submenu">
        <div class="cbl_list">
        <div class="cbl_list">
            <ul>
                <?php foreach($users as $user):?>
                <li class="cbl"><a href="/blog/<?=$user['User']['id']?>" target="_blank"><?=$user['Meta']['site_title']?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
        </div>
    </div>
    <!---子菜单end--->
    <div class="back"><a href="/" target="_self" onFocus=this.blur()><img src="/cd4you/img/list_10.png" border="0"/></a></div>
    <div class="bj_001"></div>
</div>

<div class="blog_content">
    <div class="title_namess"><img src="/cd4you/img/blog.png"  border="0"/></div>
    <!---列表start--->

                <div class="inpagecontent">

                            <div id="metroaqui_novo" class="metro-panel"></div>
                            <div id="metroaqui" class="metro-panel"></div>

                </div>
    <!---列表end--->
</div>
</div>
