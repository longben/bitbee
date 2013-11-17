<!---列表start--->
<div class="list_box">
    <div class="jcsp_box">
        <div>
            <?php foreach($news as $p):?>
            <div class="sp_left">
                <div class="sp_160"></div>
                <div class="spbox_font">我是名称我是名称</div>
            </div>
            <?php endforeach;?>
            <div class="sp_left">
                <div class="sp_160"></div>
                <div class="spbox_font">我是名称我是名称</div>
            </div>
            </div><div>
            <div class="sp_left">
                <div class="sp_160"></div>
                <div class="spbox_font">我是名称我是名称</div>
            </div>
            <div class="sp_left">
                <div class="sp_160"></div>
                <div class="spbox_font">我是名称我是名称</div>
                </div><div class="sp_left">
                <div class="sp_160"></div>
                <div class="spbox_font">我是名称我是名称</div>
                </div><div class="sp_left">
                <div class="sp_160"></div>
                <div class="spbox_font">我是名称我是名称</div>
            </div>
        </div>
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
