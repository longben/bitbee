<div class="w950">
  <div class="sidebar_left">
    <div class="column_name"><?=$module['Module']['name']?></div>
    <!---子菜单start--->
    <div class="submenu">
      <div class="cbl_list">
        <ul>
                <?php foreach($menus as $m):?>
                <?php if($m['Module']['id'] == $current):?>
                <li class="cbl_xz"><?=$m['Module']['name']?></li>
                <?php foreach($childs as $c):?>
                <li class="zcd"><a href="/app/page/<?=$module['Module']['id']?>/<?=$m['Module']['id']?>/<?=$c['Module']['id']?>"><?=$c['Module']['name']?></a></li>
                <?php endforeach;?>
                <?php else:?>
                <li class="cbl"><a href="/app/page/<?=$module['Module']['id']?>/<?=$m['Module']['id']?>"><?=$m['Module']['name']?></a></li>
                <?php endif;?>
                <?php endforeach;?>
        </ul>
      </div>
    </div>
    <!---子菜单end--->
    <div class="back"><a href="/" target="_self" onFocus=this.blur()><img src="/cd4you/img/list_10.png" border="0"/></a></div>
    <div class="bj_001"></div>
</div>

<div class="column_title">
    <div class="title_namess"><img src="/cd4you/img/<?=$module['Module']['id']?>.png" width="689" height="297"  border="0"/></div>
    <div class="column_box">
        <!---栏目名称start--->
        <div class="title_left"><?=$cmodule['Module']['name']?></div>
        <!---栏目名称end--->
        <!---地址导航start--->
        <div class="subnav"><a> &rarr; <?=$module['Module']['name']?> &rarr; <?=$cmodule['Module']['name']?></a></div>
        <!---地址导航end--->
    </div>
    <!---列表start--->
	
	
    <?php
    if(sizeof($news) == 0){
       echo $this->element('nothing');
    }elseif(sizeof($news) == 1){
       echo $this->element('single');
    }else{
       echo $this->element('list');
    }
    ?>
    <!---列表end--->
</div>
