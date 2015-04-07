<div class="ct"> 
  <!--侧边栏导航start-->
  <div id="sidebar">
    <div><img src="/jg3you/img/page_head_<?=$module['Module']['id']?>.gif" width="240" height="240" border="0" /></div>
    <div id="sidebarzxxx">
      <ul>
        <?php foreach($menus as $m):?>
        <?php if($m['Module']['id'] == $current):?>
        <li class="sub_nav"><?=$m['Module']['name']?></li>
        <?php elseif(empty($m['Module']['url'])):?>
        <li class="sub_nav_<?=$module['Module']['id']?>">
        <a href="/app/page/<?=$module['Module']['id']?>/<?=$m['Module']['id']?>" class="style1"><?=$m['Module']['name']?></a>
        </li>
        <?php else:?>
        <li class="sub_nav_<?=$module['Module']['id']?>">
        <a href="<?=$m['Module']['url']?>" class="style1" target='_blank'><?=$m['Module']['name']?></a>
        <?php endif;?>
        <?php endforeach;?>

        <li class="sub_nav_li_<?=$module['Module']['id']?>"></li>
    </ul>
</div>
<div><a href="/"><img src="/jg3you/img/page_bottom_<?=$module['Module']['id']?>.gif" width="239" height="199" border="0" /></a></a></div>
  </div>
  <!--侧边栏导航end-->
  <div id="container">
      <div id="containerbox">
          <div class="column"><?=$module['Module']['name']?></div>
          <div class="andbox">
              <div class="english"><?=$cmodule['Module']['name']?></div>
              <div class="samllnav">首页 &rarr; <?=$module['Module']['name']?> &rarr; <?=$cmodule['Module']['name']?></div>
          </div>
      </div>
      <div><img src="/jg3you/img/list_03.gif" width="710" height="48" border="0" /></div>

<?php

if(!empty($cmodule['Module']['display_style'])){
    echo $this->element($cmodule['Module']['display_style']);
}else{
    if(sizeof($news) == 0){
        echo $this->element('nothing');
        //}elseif(sizeof($news) == 1){
        //   echo $this->element('single');
    }else{
        echo $this->element('list');
    }
}
?>

  </div>
</div>
