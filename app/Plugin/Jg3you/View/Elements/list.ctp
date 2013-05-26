<!---列表start--->
<div class="list_box">
    <div class="btwo_list">
        <ul>
            <?php foreach($news as $p):?>
            <li class="list"><a href="/app/content/<?=$p['Post']['id']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
            <?php endforeach;?>
			<div></div>
        </ul>
    </div>

    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<!---列表end--->
