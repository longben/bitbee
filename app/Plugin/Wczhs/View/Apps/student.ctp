<div class="flashad" style="height:200px;">
    <img src="/wczhs/img/students_pic.jpg" />
</div>

<div class="inpage">
    <div class="bottombg">
        <div class="outdiv">
            <div class="leftcon">
                <div class="title">
                    <div class="bluepannel">
                        <div class="title">
                            <div class="left"><div class="right"><div class="titlenews"></div></div></div>
                        </div>
                    </div>
                </div>

                <div class="leftmenus">
                    <a href="/app/student/501/优秀学员">优秀学员</a>
                    <a href="/app/student/502/学员作品">学员作品</a>

                </div>
            </div>
            <div class="rightcon">
                <div class="inpagetitle">
                    <div class="left"><div class="right"><?=$title?></div></div>
                </div>
                <div class="inpagecontent">
                    <div class="inpagecontent">
                        <!-- 内容B -->
                        <?php foreach($posts as $post):?>
                        <div class="piclist">
                            <div class="picborder">
                                <div class="img"><table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td align="center" valign="middle">
                                                <a href="/app/content/<?=$post['Post']['id']?>" target="_blank">
                                                    <img src="<?php echo $post['Meta']['picture']?>" width="153" height="115" border="0">
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="word"><a href="/app/content/<?=$post['Post']['id']?>" target="_blank"><?php echo $post['Post']['post_title']?></a></div>
                            </div>
                        </div>
                        <?php endforeach;?>

                        <div class="pages"><a href="">首页</a><a href="">1</a><span>2</span><a href="3">3</a><a href="">尾页</a></div>
                        <!-- 内容E -->
                    </div>
                </div>
            </div>
        </div>
        <div class="leftbottom">
            <div class="bluepannel">
                <div class="bottom">
                    <div class="left"><div class="right"></div></div>
                </div>
            </div>
        </div>
    </div>
</div>
