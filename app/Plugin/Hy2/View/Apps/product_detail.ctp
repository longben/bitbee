<script>
    $(function(){
        $('.secmenus').bind('mouseover',function(event){
            $("#showmenus .secmenus").attr("class","no secmenus")
            $(this).attr("class","over secmenus");
            $(".inthirdmenu").css("display","none");
            $("#thirdmenu"+$(this).attr("id").replace("menu","")).css("display","block");
        })
        var nowpic=1;
        var allpic=0;
        $(function(){
            allpic=$(".canclick").length;
        })
        $(".canclick").bind("click",function(event){
            $("#showbigimg").attr("src",$(this).children("input[name='img']").val());
            $(".canclick").attr("class","isno canclick")
            $(this).attr("class","isover canclick");
            nowpic=parseInt($(this).attr("id").replace("button",""));
        })
        $("#leftbutton").bind("click",function(event){
            if(nowpic>1){
                nowpic=nowpic-1;
                }else{
                nowpic=allpic;
            }
            $("#showbigimg").attr("src",$("#button"+nowpic).children("input[name='img']").val());
            $(".canclick").attr("class","isno canclick")
            $("#button"+nowpic).attr("class","isover canclick");
        })
        $("#rightbutton").bind("click",function(event){
            if(nowpic<allpic){
                nowpic=nowpic+1;
                }else{
                nowpic=1;
            }
            $("#showbigimg").attr("src",$("#button"+nowpic).children("input[name='img']").val());
            $(".canclick").attr("class","isno canclick")
            $("#button"+nowpic).attr("class","isover canclick");
        })

    })
</script>

<div id="warp">
    <div class="bannerbg inpagebanner">
        <div class="bannersbg"></div>
    </div>
</div>

<div class="secpagecon">
    <div class="weizhi"><a href="">首頁</a> &gt; 產品列表</div>
    <div class="geline"></div>
    <div class="pagetitle shadow"><?=$product['Product']['name']?></div>
    <div class="proshowpic">
        <div class="bigimg">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td width="28" valign="middle" id="leftbutton" style="cursor:pointer"><img src="/hy2/img/left_scroll.png"  /></td>
                    <td align="center">
                        <table align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td class="pics"><img src="/hy2/img/temppic.jpg" id="showbigimg" /></td>
                            </tr>
                            <tr>
                                <td><img src="/hy2/img/pic_shadow.png" width="100%" /></td>
                            </tr>
                        </table>

                    </td>
                    <td width="28" valign="middle"  id="rightbutton" style="cursor:pointer"><img src="/hy2/img/right_scroll.png"/></td>
                </tr>
            </table>
        </div>
        <table align="center">
            <tr>
                <td class="showsml">
                    <div class="isover canclick" id="button1" >
                        <input type="hidden" name="img" value="/hy2/img/temppic.jpg" />
                        <img src="/hy2/img/temppic.jpg" />
                    </div>
                    <div class="isno canclick"  id="button2">
                        <input type="hidden" name="img" value="temp/1.jpg" /><img src="temp/1.jpg" />
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="protitleinfo">
        <div class="proclass">產品介紹</div>
        <div class="probuy"><a href=""><img src="/hy2/img/showbuy.png" border="0" /></a></div>
    </div>
    <div class="newscontents">
        <?=$product['Product']['description']?>
    </div>

    <div class="protitleinfo">
        <div class="proclass">產品細節展示</div>
    </div>

    <div class="proallpic" align="center">
        <table align="center" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td class="pics"><img src="" width="950" /></td>
            </tr>
            <tr>
                <td><img src="/hy2/img/pic_shadow.png" width="100%" /></td>
            </tr>
        </table>
    </div>

    <div class="newslinks">
        <div class="showfront"><a href="">< 上一篇 中國 HTNS深圳公司</a></div>
        <div class="reback"><a href=""><img src="/hy2/img/reback.png" border="0" /></a></div>
        <div class="shownext"><a href="">支持記錄4K分辨率影像的...下一篇></a></div>
    </div>
