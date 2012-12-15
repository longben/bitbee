<div class="flash" style="border:1px dotted #ccc;"><img src="/hy/img/cproducts_title.jpg" /></div>
<div class="outdiv">
    <div class="inpageleft">
        <?php 
        foreach($codes as $code){
          echo $code['Code']['id'] == $code_id?'<span>'.$code['Code']['name'].'</span>':$this->Html->link($code['Code']['name'], '/zh/product/'. $code['Code']['id']);
        }
        ?>
    </div>
    <div class="inpageright">
        <div class="titlebg">
            <div class="titleleft">
                <div class="titleright">
                    <div class="titlewords">
                        <span class="blue">產品展示</span> 
                    </div>
                </div>
            </div>
        </div>
        <div class="piclist">
            <?php foreach($products as $p):?>
            <div class="pics">
                <div class="in">
                    <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
                        <a href="/zh/product_detail/<?=$p['Product']['id']?>" title="<?=$p['Product']['name']?>">
                            <img src="/upload/user/products/<?=$p['Product']['picture']?>" width="217" height="168" border="0" />
                        </a>
                    </table>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
