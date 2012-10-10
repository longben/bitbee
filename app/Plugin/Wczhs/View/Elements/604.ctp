<div class="inpagecontent">      
    <div class="newsList">
        <?php foreach($news as $post):?>
        <div class="lists">
            <div class="left">
                <a href="/app/content/<?=$post['Post']['id']?>" target="_blank"><?=$post['Post']['post_title']?></a>
            </div>
            <div class="right"><?=$post['Post']['post_date']?></div>
        </div>
        <?php endforeach;?>
    </div>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
