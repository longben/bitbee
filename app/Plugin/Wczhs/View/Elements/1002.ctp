<div class="newsList">
    <?php foreach($posts as $post):?>
    <div class="lists">
        <div class="left">
            <a href="/app/content/<?=$post['Post']['id']?>" target="_blank"><?=$post['Post']['post_title']?></a>
        </div>
        <div class="right"><?=$post['Post']['post_date']?></div>
    </div>
    <?php endforeach;?>
</div>
