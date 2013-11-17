<div class="content">
  <div class="box2">

    <div class="sidebar">
      <div class="listtitle1">
        <h1><?=$module['Module']['name']?></h1>
        <h2></h2>
      </div>

      <div class="cbbox">
        <?php foreach($menus as $m):?>
        <?php if($m['Module']['id'] == $current):?>
        <div class="cb">
          <span class="right5"><img src="/jbyx/img/sen_07.gif" width="9" height="9"/></span><?=$m['Module']['name']?>
        </div>
        <?php else:?>
        <div class="cb">
          <span class="right5"><img src="/jbyx/img/sen_07.gif" width="9" height="9"/></span>
          <a href="/app/page/<?=$module['Module']['id']?>/<?=$m['Module']['id']?>" class="style1"><?=$m['Module']['name']?></a>
        </div>
        <?php endif;?>
        <?php endforeach;?>
      </div>

      <div class="btnjj"><img src="/jbyx/img/sen_08.gif" width="220" height="8" /></div>
      <div class="btnjj"><img src="/jbyx/img/sen_09.gif" width="220" height="65" /></div>
      <div class="btnjj"><img src="/jbyx/img/sen_10.gif" width="220" height="65" /></div>
    </div>

    <div class="listright">
      <div class="listtitle2">
        <div class="column"><?=$module['Module']['name']?></div>
        <div class="fontnav">首页 &rarr; <?=$module['Module']['name']?> &rarr; <?=$cmodule['Module']['name']?></div>
      </div>

      <div class="columnjs">
        <div class="title"><img src="/jbyx/img/page<?=$module['Module']['id']?>.gif" width="178" height="132" /></div>
        <div class="jsfont">
          <h3><?=$cmodule['Module']['name']?></h3>
          <h4><?=$cmodule['Module']['description']?></h4>
        </div>
      </div>
      <div class="taitou"></div>

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
