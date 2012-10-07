<div class="content" style="margin-top:10px;margin-bottom:10px;">
<div class="pannelTop" >
      <div class="pannelTopLeft"></div>
      <div class="pannelTopBg" style="width:98%;"></div>
      <div class="pannelTopRight"></div>
    </div>

    <div class="pannelMiddel">
        <div class="pannelMidLeft" style="height:440px;" id="mainheightleft"></div>
        <div class="pannelMidBg" style="width:98%; height:auto !important; height:480px; min-height:480px;" id="mainheight">
            <div class="ConTitles"><?php echo $post['Post']['post_title']?></div>
            <div class="ConDates">时间:<?php echo $post['Post']['post_date']?></div>
            <div class="Contents">
                <?php echo $post['Post']['post_content']?>
            </div>            
        </div>
        <div class="pannelMidRight" style="height:440px" id="mainheightright"></div>
    </div>
	
    <div class="pannelBottom" >
        <div class="pannelBottomLeft"></div>
        <div class="pannelBottomBg" style="width:98%"></div>
        <div class="pannelBottomRight"></div>
    </div>
	<br/>
	<div align="center"><a href="javascript:window.close()"><img src='/img/close.jpg' border="0"/></a></div>
</div>


<script>
document.getElementById("mainheightleft").style.height=document.getElementById("mainheight").offsetHeight +"px";
document.getElementById("mainheightright").style.height=document.getElementById("mainheight").offsetHeight+"px";
</script>