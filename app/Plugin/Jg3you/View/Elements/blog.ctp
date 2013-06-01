<?php  
echo $this->Html->script(array('jquery/jquery.metro-btn'), array('inline' => false));
echo $this->Html->css(array('/jg3you/css/jq-metro/jq-metro'), 'stylesheet', array('inline' => false));
?>

<script type="text/javascript">
    $(document).ready(function () {

        <?php foreach($users as $i=>$user):?>
        <?php srand((double)microtime()*1000000);?>
        $("#metroaqui_novo").AddMetroSimpleButton('bt<?=$i?>', '<?=$cssStyle[array_rand($cssStyle)]?>', '/jg3you/img/blog_bg.png', '<?=$user['Meta']['site_title']?>', 'gotoUrl("/blog/<?=$user['User']['id']?>");');
        <?php endforeach;?>

    });

    function gotoUrl(url){
        window.location = url;
    }
</script>
<div class="w950">


    <div class="blog_content">
        <!---列表start--->
        <div class="inpagecontent">
            <div id="metroaqui_novo" class="metro-panel"></div>
            <div id="metroaqui" class="metro-panel"></div>
        </div>
        <!---列表end--->
    </div>
</div>
