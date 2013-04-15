<!--焦点图片start-->
<div class="w950">   
  <div class="photo">
    <div id="newsSlider">
      <div class="container">
        <ul class=slides>          
          <li><a href="#" ><img src="/cd4you/img/02.jpg" border="0"></a> </li>
          <li><a href="#" ><img src="/cd4you/img/03.jpg" border="0"></a> </li>
          <li><a href="#" ><img src="/cd4you/img/04.jpg" border="0"></a> </li>
          <li><a href="#" ><img src="/cd4you/img/05.jpg" border="0"></a> </li>
        </ul>
      </div>
      <div class="validate_Slider"></div>
      <ul class="pagination">
        <li><a href="#">1</a> </li>
        <li><a href="#">2</a> </li>
        <li><a href="#">3</a> </li>
        <li><a href="#">4</a> </li>        
      </ul>
    </div>
  </div>
</div>
 <!--焦点图片end--> 
  
<div class="w950"> 
  <!--信箱start-->
  <div class="mail"><a href="/app/mailbox" target="_self" onFocus=this.blur()><img src="/cd4you/img/mail.gif" width="285" height="300" border="0" /></a></div>
  <!--信箱end--> 
  <!--最新消息start-->
  <div class="news">
    <div class="news_list">
      <ul>
			<?php foreach($news as $p):?>
			<li class="newslist"><a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>"  target="_blank"><?=$p['Post']['post_title']?></a></li>
			<?php endforeach;?>
      </ul>
    </div>
  </div>
  <!--最新消息end-->
  <!--校园公告start-->
  <div class="xygg">
    <ul>
		<?php foreach($xygg as $p):?>
		<li class="bluefont"><a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>"  target="_blank"><?=$p['Post']['post_title']?></a></li>
		<?php endforeach;?>
    </ul>
  </div>
  <!--校园公告end--> 
</div>

<div class="w950">
  <!---国际大型活动start--->
  <div class="gjdxhd">
    <ul>
			<?php foreach($qydxhd as $p):?>
			<li class="gjdxhdd"><a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
			<?php endforeach;?>
    </ul>
  </div>
  <!---国际大型活动end--->  
  <!---特色领域活动start--->
  <div class="tslyhd">
    <ul>
			<?php foreach($tslyhd as $p):?>
			<li class="gjdxhdd"><a href="/app/content/<?=$p['Post']['id']?>"  title="<?=$p['Post']['post_title']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
			<?php endforeach;?>
    </ul>
  </div>
  <!---特色领域活动end--->  
  <!---教研动态start--->
  <div class="jydt">
    <ul>
			<?php foreach($jydt as $p):?>
			<li class="bluefont"><a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>"  target="_blank"><?=$p['Post']['post_title']?></a></li>
			<?php endforeach;?>
    </ul>
  </div>
  <!---教研动态end--->
</div>

<div class="w950">
<!---家园共育start--->
  <div class="jygy">
    <ul>
			<?php foreach($jygy as $p):?>
			<li class="gjdxhdd"><a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>"  target="_blank"><?=$p['Post']['post_title']?></a></li>
			<?php endforeach;?>
    </ul>
  </div>
<!---家园共育end--->  
<!--温馨班级start--->
  <div class="wxbj">
    <ul>
			<?php foreach($wxbj as $p):?>
			<li class="gjdxhdd"><a href="/app/content/<?=$p['Post']['id']?>"  title="<?=$p['Post']['post_title']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
			<?php endforeach;?>
    </ul>
  </div>
 <!---温馨班级end--->
<!---集团建设start--->
  <div class="jtjs">
    <ul>
			<?php foreach($jtjs as $p):?>
			<li class="bluefont"><a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
			<?php endforeach;?>
    </ul>
  </div>
<!---集团建设end--->  
</div>

<div class="w950">
<!---早教中心start--->
  <div class="zjzx">
    <ul>
		<?php foreach($zjzx as $p):?>
		<li class="zjzxa"><a href="/app/content/<?=$p['Post']['id']?>"  title="<?=$p['Post']['post_title']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
		<?php endforeach;?>
    </ul>
  </div>
<!---早教中心end--->
<!---营养健康start--->
  <div class="yyjk">
    <ul>
		<?php foreach($yyjk as $p):?>
		<li class="zjzxa"><a href="/app/content/<?=$p['Post']['id']?>"  title="<?=$p['Post']['post_title']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
		<?php endforeach;?>
    </ul>
  </div>
<!---营养健康end--->
<!---资源共享start---> 
  <div class="zygx">
    <ul>
			<?php foreach($zygx as $p):?>
			<li class="zjzxa"><a href="/app/content/<?=$p['Post']['id']?>"   title="<?=$p['Post']['post_title']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
			<?php endforeach;?>
    </ul>
  </div>
<!---资源共享end--->
<!--在线办事start---> 
  <div class="zxbs">
    <ul>
		<?php foreach($zxbs as $p):?>
		<li class="zjzxa"><a href="/app/content/<?=$p['Post']['id']?>"   title="<?=$p['Post']['post_title']?>" target="_blank"><?=$p['Post']['post_title']?></a></li>
		<?php endforeach;?>
    </ul>
  </div>
  <!---在线办事end--->  
</div>

<?php if(sizeof($links)):?>
<div class="w950">
    <div class="yqlink">
        <?php foreach($links as $link):?>
        <div class="pcitupian"><a href="<?=$link['Attachment']['url']?>" target="_blank"><img src="/upload/user/images/<?=$link['Attachment']['file_path']?>" width="152" height="70" border="0"/></a></div>
        <?php endforeach;?>
    </div>
</div>
<?php endif;?>

