<!---列表start--->
<div class="list_box">
    <div class="btwo_list">
        <ul>
            <?php foreach($news as $p):?>
            <li class="btwo"><a href="/zjsy/third.html"><?=$p['Post']['post_title']?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
    <div class="fg_line"></div>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<!---列表end--->
