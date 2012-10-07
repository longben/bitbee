<div class="con">
    <p align="center"><a href="/app/contact/guestbook_write"><img src='/wczhs/img/wyly.png' border="0"></a></p>
    <table width="100%" border="0">
        <?php 
        $i = 0;
        foreach($guestbooks as $g):
        $class = null;
        if ($i++ % 2 == 0) {
        $class = ' class="altrow"';
        }           
        ?>
        <tr<?php echo $class;?>>
            <td width="37%"><b>留言者：</b><?=$g['Guestbook']['username']?></td>
            <td width="63%"><b>留言时间：</b><?=$g['Guestbook']['created']?></td>
        </tr>
        <tr<?php echo $class;?>>
            <td colspan="2"><b>留言内容：</b><?=$g['Guestbook']['content']?></td>
        </tr>
        <tr<?php echo $class;?>>
            <td colspan="2"><font color="red"><b>管理员回复：</b></font><?=$g['Guestbook']['reply_content']?></td>
        </tr>
        <?php endforeach;?>
    </table>           
</div> 
