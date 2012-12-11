<?php  
echo $this->Html->script(array('jquery/jquery.metro-btn'), array('inline' => false));
echo $this->Html->css(array('/wczhs/css/jq-metro/jq-metro'), 'stylesheet', array('inline' => false));
?>

<script type="text/javascript">
$(document).ready(function () {

    $("#metroaqui_novo").AddMetroDoubleWithTrailer('bt6', 'metro-azul', '/wczhs/css/jq-metro/admin.png', '五彩智慧树博客', '', 'metro-verde');
    //$("#metroaqui_novo").AddMetroDoubleWithTrailerWithBG('bt6', '/upload/user/avatar/default.jpg', '五彩智慧树', 'alert("Text");', 'metro-azul');

    <?php foreach($users as $user):?>
    <?php srand((double)microtime()*1000000);?>
    $("#metroaqui_novo").AddMetroSimpleButton('bt1', '<?=$cssStyle[array_rand($cssStyle)]?>', '/wczhs/img/blog.png', '<?=$user['Meta']['site_title']?>', 'gotoUrl("/blog/<?=$user['User']['id']?>");');
    <?php endforeach;?>

/* 正式运营起来，就有足够的班级支持，暂且屏蔽
    $("#metroaqui_novo").AddMetroSimpleButton('bt2', 'metro-laranja', '/wczhs/css/jq-metro/carta.png', 'Laranja', 'alert("Laranja");');
    $("#metroaqui_novo").AddMetroSimpleButton('bt5', 'metro-roxo', '/wczhs/css/jq-metro/carta.png', 'Laranja', 'alert("Laranja");');
    $("#metroaqui_novo").AddMetroSimpleButton('bt1', 'metro-vermelho', '/wczhs/css/jq-metro/admin.png', 'Teste Roger', '');
    $("#metroaqui_novo").AddMetroSimpleButton('bt2', 'metro-laranja', '/wczhs/css/jq-metro/carta.png', 'Laranja', '');
    $("#metroaqui_novo").AddMetroSimpleButton('bt1', 'metro-verde', '/wczhs/css/jq-metro/carta.png', 'Teste Roger', '');
    $("#metroaqui_novo").AddMetroDoubleButton('bt4', 'metro-azul', '/wczhs/css/jq-metro/carta.png', 'Azul', 'alert("Azul");');

    $("#metroaqui").AddMetroDoubleButton('bt4', 'metro-azul', '/wczhs/css/jq-metro/carta.png', '2012', 'alert("Azul");');
    $("#metroaqui").AddMetroSimpleButton('bt3', 'metro-vermelho', '/wczhs/css/jq-metro/carta.png', '11', 'alert("Vermelho");');
    $("#metroaqui").AddMetroSingleLabeledButton('bt6', 'metro-roxo', '/wczhs/css/jq-metro/carta.png', '30', 'alert("Vermelho");');	
*/
});

function gotoUrl(url){
    window.location = url;
}
</script>


<div class="flashad" style="height:200px;">
    <img src="/wczhs/img/about_pic.jpg" />
</div>

<div class="inpage">
    <div class="bottombg">
        <div class="outdiv">
            <div class="leftcon">
                <div class="title">
                    <div class="bluepannel">
                        <div class="title">
                            <div class="left"><div class="right"><div class="titleabout"></div></div></div>
                        </div>
                    </div>
                </div>

                <div class="leftmenus_blog">
						<img src="/wczhs/img/blog_left.png" width="246" />
                </div>
            </div>
            <div class="rightcon">
                <div class="inpagetitle">
                    <div class="left"><div class="right">五彩智慧树博客</div></div>
                </div>
                <div class="inpagecontent">

                            <div id="metroaqui_novo" class="metro-panel"></div>
                            <div id="metroaqui" class="metro-panel"></div>

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
