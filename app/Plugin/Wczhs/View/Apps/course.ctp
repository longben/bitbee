<div class="flashad" style="height:200px;">
    <img src="/wczhs/img/course_pic.jpg" />
</div>

<div class="inpage">
    <div class="bottombg">
        <div class="outdiv">
            <div class="leftcon">
                <div class="title">
                    <div class="bluepannel">
                        <div class="title">
                            <div class="left"><div class="right"><div class="titlecourse"></div></div></div>
                        </div>
                    </div>
                </div>

                <div class="leftmenus">
                    <a href="/app/course/1001/课程介绍">课程介绍</a>
                    <a href="/app/course/1002/课程下载">课程下载</a>
                </div>
            </div>
            <div class="rightcon">
                <div class="inpagetitle">
                    <div class="left"><div class="right"><?=urldecode($title)?></div></div>
                </div>
                <div class="inpagecontent">
                    <?php echo $this->element($page); ?>
					<div class="paging">
					<?php
						echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
						echo $this->Paginator->numbers(array('separator' => ''));
						echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
					?>
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
