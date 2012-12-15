<div class="flash" style="border:1px dotted #ccc;"><img src="/hy/img/cproducts_title.jpg" /></div>
<div class="outdiv">
    <div class="inpageleft">
        <?php 
        foreach($codes as $code){
          echo $this->Html->link($code['Code']['name'], 'product/'. $code['Code']['id']);
        }
        ?>
    </div>
    <div class="inpageright">
        <div class="titlebg">
            <div class="titleleft">
                <div class="titleright">
                    <div class="titlewords">
                        <span class="blue"><?=$product['Product']['name']?></span> 
                    </div>
                </div>
            </div>
        </div>
        <div class="piclist">
            <?=$product['Product']['description']?>
        </div>
    </div>
</div>
