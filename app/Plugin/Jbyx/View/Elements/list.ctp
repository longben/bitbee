<!---列表start--->
<div class="btwo_list">
  <ul>
    <?php foreach($news as $p):?>
    <li class="btwo"><a href="/app/content/<?=$p['Post']['id']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
    <?php endforeach;?>
  </ul>
</div>
<div class="fenge1"></div>

<div class="fenye">
  <div class="paging">
    <?php
    echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
    echo $this->Paginator->numbers(array('separator' => ''));
    echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
  </div>
</div>

<div class="jiange20"></div>
<!---列表end--->
