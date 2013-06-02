<div class="ct"> 
  <!--侧边栏导航start-->
  <div id="sidebar">
    <div><img src="/jg3you/img/page_head_3.gif" width="240" height="240" border="0" /></div>
    <div id="sidebarzxxx">
      <ul>
        <li class="sub_nav_3"></li>
		<li class="sub_nav_3"></li>
		<li class="sub_nav_3"></li>
		<li class="sub_nav_3"></li>
		<li class="sub_nav_3"></li>
        <li class="sub_nav_li_3"></li>
    </ul>
</div>
<div><a href="/"><img src="/jg3you/img/page_bottom_3.gif" width="239" height="199" border="0" /></a></a></div>
  </div>
  <!--侧边栏导航end-->
  <div id="container">
      <div id="containerbox">
          <div class="column">搜索结果</div>
          <div class="andbox">
              <div class="english">SEARCH</div>
              <div class="samllnav">首页 &rarr; 搜索结果</div>
          </div>
      </div>
      <div><img src="/jg3you/img/list_03.gif" width="710" height="48" border="0" /></div>

<?php
    if(sizeof($news) == 0){
        echo $this->element('nothing');
    }else{
        echo $this->element('list');
    }
?>
  </div>
</div>
