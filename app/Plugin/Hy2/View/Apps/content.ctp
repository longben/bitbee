<div id="warp">
    <div class="bannerbg inpagebanner">
        <div class="bannersbg"></div>
    </div>
</div>

<div class="secpagecon">
  <div class="weizhi"><a href="/">首頁</a> &gt; <a href="/zh/news">新聞活動</a> &gt; <?=$post['Post']['post_title']?></div>
  <div class="geline"></div>
  <div class="newstitle shadow">
      <div class="titles"><?=$post['Post']['post_title']?></div>
      <div class="date"><?=date("Y-m-d",strtotime($post['Post']['post_date']))?></div>
  </div>
  
  <div class="newscontents">
<?php echo $post['Post']['post_content'];?>
  </div>
  
  <div class="newslinks">
    <div class="showfront"><a href="">< 上一篇 中國 HTNS深圳公司</a></div>
    <div class="reback"><a href=""><img src="/hy2/img/reback.png" border="0" /></a></div>
    <div class="shownext"><a href="">支持記錄4K分辨率影像的...下一篇></a></div>
  </div>
