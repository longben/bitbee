<!-- 内容B -->
<?php foreach($posts as $post):?>
<div class="piclist">
    <div class="picborder">
        <div class="img"><table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td align="center" valign="middle"><a href="/app/content/<?=$post['Post']['id']?>" target="_blank"><img src="<?php echo $post['Meta']['picture']?>" width="153" height="115"/ border="0"></a></td>
                </tr>
            </table>
        </div>
        <div class="word"><a href="/app/content/<?=$post['Post']['id']?>" target="_blank"><?php echo $post['Post']['post_title']?></a></div>
    </div>
</div>
<?php endforeach;?>
<!-- 内容E -->
