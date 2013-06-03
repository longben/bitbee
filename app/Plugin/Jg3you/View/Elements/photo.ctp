                <div class="inpagecontent">
                    <div class="photolistbox">
                        <!-- 内容B -->
                        <?php foreach($news as $post):?>
                        <div class="photobox">
                            <div class="photowh">

                                                <a href="/app/content/<?=$post['Post']['id']?>" target="_blank">
                                                    <img src="<?php echo dirname($post['Meta']['picture']).'/240x180_'.basename($post['Meta']['picture'])?>" width="220" height="164" border="0">
                                                </a>
                                
                            </div>
							<div class="word"><a href="/app/content/<?=$post['Post']['id']?>" target="_blank"><?php echo $post['Post']['post_title']?></a></div>
                        </div>
                        <?php endforeach;?>
                        <div class="paging">
                            <?php
                            echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                            echo $this->Paginator->numbers(array('separator' => ''));
                            echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                            ?>
                        </div>
                        <!-- 内容E -->
                    </div>
                </div>