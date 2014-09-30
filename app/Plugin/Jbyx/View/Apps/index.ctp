<div class="content">
  <!---图片新闻start--->
  <div class="box1">

    <div id="photonews">
      <div class="container" id="idTransformView">
        <ul class="slider" id="idSlider">
          <?php foreach($covers as $cover):?>
          <li><a href="#" ><img src="/upload/user/images/<?=$cover['Attachment']['file_path']?>" border="0"></a></li>
          <?php endforeach;?>
        </ul>
        <ul class="num" id="idNum">
          <?php foreach($covers as $i=>$cover):?>
          <li><?php echo $i+1;?></li>
          <?php endforeach;?>
        </ul>
      </div>
      <script type="text/javascript" language="javascript" src="/jbyx/js/jdtp.js"></script>
    </div>

    <div class="news">
      <div class="title"><img src="/jbyx/img/index_04.png" width="345" height="45" border="0" /></div>
      <div class="more">
        <a href="/app/page/5"><img src="/jbyx/img/index_05.png" width="45" height="45" border="0" /></a>
      </div>
      <div class="jobs">
        <ul>
          <?php foreach($news as $p):?>
          <li class="h33">date("Y/m/d", $tomorrow)
          <span><?=date("Y-m-d",$p['Post']['post_date'])?></span>
          <div class="h333">
            <a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>"  target="_blank"><?=$p['Post']['post_title']?></a>
          </div>
          </li>
          <?php endforeach;?>
        </ul>
      </div>
    </div>
  </div>
  <!---图片新闻end--->
  <div class="box2">
    <div class="b2left">
      <div class="w656h263">
        <!---棋类文化start--->
        <div class="titlebox">
          <div class="title"><img src="/jbyx/img/index_06.png" width="273" height="45" border="0" /></div>
          <div class="title">
            <a href="/app/page/8/801"><img src="/jbyx/img/index_07.png" width="47" height="45" border="0" /></a>
          </div>
          <div class="jobs2">
            <ul>
              <?php foreach($qlwh as $p):?>
              <li class="w320">
              <a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>" target="_blank">
                <?=$p['Post']['post_title']?>
              </a>
              </li>
              <?php endforeach;?>
            </ul>
          </div>
        </div>
        <!---棋类文化end--->
        <!---双语教学start--->
        <div class="titlebox">
          <div class="title"><img src="/jbyx/img/index_08.png" width="273" height="45" border="0" /></div>
          <div class="title">
            <a href="/app/page/8/802"><img src="/jbyx/img/index_07.png" width="47" height="45" border="0" /></a>
          </div>
          <div class="jobs">
            <ul>
              <?php foreach($syjx as $p):?>
              <li class="w320">
              <a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>" target="_blank">
                <?=$p['Post']['post_title']?>
              </a>
              </li>
              <?php endforeach;?>
            </ul>
          </div>
        </div>
        <!---双语教学end---> </div>
      <div class="w656h263">
        <!---教改动态start--->
        <div class="titlebox">
          <div class="title"><img src="/jbyx/img/index_14.png" width="273" height="45" border="0" /></div>
          <div class="title">
            <a href="/app/page/7/701"><img src="/jbyx/img/index_15.png" width="47" height="45" border="0" /></a>
          </div>
          <div class="jobs2">
            <ul>
              <?php foreach($jgdt as $p):?>
              <li class="w320">
              <a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>" target="_blank">
                <?=$p['Post']['post_title']?>
              </a>
              </li>
              <?php endforeach;?>
            </ul>
          </div>
        </div>
        <!---教改动态end--->
        <!---教师论文start--->
        <div class="titlebox">
          <div class="title"><img src="/jbyx/img/index_16.png" width="273" height="45" border="0" /></div>
          <div class="title">
            <a href="/app/page/7/702"><img src="/jbyx/img/index_17.png" width="47" height="45" border="0" /></a>
          </div>
          <div class="jobs">
            <ul>
              <?php foreach($jslw as $p):?>
              <li class="w320">
              <a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>" target="_blank">
                <?=$p['Post']['post_title']?>
              </a>
              </li>
              <?php endforeach;?>
            </ul>
          </div>
        </div>
        <!---教师论文end---> </div>
    </div>
    <div class="titleright">
      <!---每周工作安排start--->
      <div>
        <div class="title"><img src="/jbyx/img/index_10.png" width="245" height="45" border="0" /></div>
        <div class="title">
          <a href="/app/page/5/502"><img src="/jbyx/img/index_11.png" width="34" height="45" border="0" /></a>
        </div>
        <div class="w181jobs">
          <ul>
            <?php foreach($mzgzap as $p):?>
            <li class="w265">
            <a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>" target="_blank">
              <?=$p['Post']['post_title']?>
            </a>
            </li>
            <?php endforeach;?>
          </ul>
        </div>
      </div>
      <!---每周工作安排end--->
      <div>
        <div class="title"><img src="/jbyx/img/index_12.png" width="245" height="45" border="0" /></div>
        <div class="title"><img src="/jbyx/img/index_13.png" width="34" height="45" border="0" /></div>
        <div><a href="/app/page/6/601"><img src="/jbyx/img/index_18.png" width="279" height="59" border="0" /></a></div>
        <div><a href="/app/page/6/602"><img src="/jbyx/img/index_19.png" width="279" height="49" border="0" /></a></div>
        <div><a href="/app/page/6/603"><img src="/jbyx/img/index_20.png" width="279" height="49" border="0" /></a></div>
        <div><a href="/app/page/6/604"><img src="/jbyx/img/index_21.png" width="279" height="70" border="0" /></a></div>
      </div>
    </div>
  </div>
  <div class="box2">
    <!---小小艺术家start--->
    <div class="w335">
      <div>
        <div class="title">
          <a href="/app/page/9/902"><img src="/jbyx/img/index_23.png" width="168" height="141" border="0" /></a>
        </div>
        <div class="title">
          <a href="/app/page/9/902"><img src="/jbyx/img/index_24.png" width="166" height="141" border="0" /></a>
        </div>
      </div>
      <div>
        <div class="title">
          <a href="/app/page/9/902"><img src="/jbyx/img/index_25.png" width="168" height="140" border="0" /></a>
        </div>
        <div class="title">
          <a href="/app/page/9/902"><img src="/jbyx/img/index_26.png" width="166" height="140" border="0" /></a>
        </div>
      </div>
    </div>
    <!---小小艺术家end--->
    <!---班级风采start--->
    <div class="bjfc">
      <div id="demo" align=center>
        <table border=0 align=center cellpadding=1 cellspacing=1 cellspace=0 >
          <tr>
            <td valign=top id=marquePic1>
              <table width='100%' border='0' cellspacing='0'>
                <tr>
                  <?php foreach($bktp as $post):?>
                  <td align="center">
                    <a class="pcibox" href="/blog/main/archive/<?=$post['Post']['post_author']?>/<?=$post['Post']['id']?>" target="_blank" class="145110" >
                      <img class="boxbb" src='<?php echo dirname($post['Meta']['picture']).'/240x180_'.basename($post['Meta']['picture'])?>' width="190" height="142" border="0"/>
                    </a>
                  </td>
                  <?php endforeach;?>
                </tr>
              </table>
            </td>
            <td id=marquePic2 valign=top></td>
          </tr>
        </table>
      </div>
      <script type="text/javascript" language="javascript" src="/jbyx/js/hxgd.js"></script></div>
    <!---班级风采end--->
    <div class="jiange20"></div>
  </div>
  <div class="box2">
    <div class="ct">
      <div class="hlgkk">
        <div class="title"><img src="/jbyx/img/index_27.png" width="256" height="36" border="0" /></div>
        <div class="title">
          <a href="/app/page/10/1001"><img src="/jbyx/img/index_28.png" width="50" height="36" border="0" /></a>
        </div>
        <div class="jobs3">
          <ul>
            <?php foreach($hlgkk as $p):?>
            <li class="w265">
            <a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>" target="_blank">
              <?=$p['Post']['post_title']?>
            </a>
            </li>
            <?php endforeach;?>
          </ul>
        </div>
      </div>
      <div class="bjbk">
        <div class="title"><img src="/jbyx/img/index_29.png" width="253" height="36" border="0" /></div>
        <div class="title">
          <a href="3"><img src="/jbyx/img/index_30.png" width="58" height="36" border="0" /></a>
        </div>
        <div class="jobs3">
          <ul>
            <?php foreach($bjbk as $p):?>
            <li class="w265">
            <a href="/blog/main/archive/<?=$p['Post']['post_author']?>/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>" target="_blank"><?=$p['Post']['post_title']?></a>
            </li>
            <?php endforeach;?>
          </ul>
        </div>
      </div>
      <div class="jpja">
        <div class="title"><img src="/jbyx/img/index_31.png" width="255" height="36" border="0" /></div>
        <div class="title">
          <a href="/app/page/7/703"><img src="/jbyx/img/index_32.png" width="56" height="36" border="0" /></a>
        </div>
        <div class="jobs3">
          <ul>
            <?php foreach($jpja as $p):?>
            <li class="w265">
            <a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>" target="_blank">
              <?=$p['Post']['post_title']?>
            </a>
            </li>
            <?php endforeach;?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="box2">
    <div class="newssamll">
      <div class="title"><img src="/jbyx/img/index_34.png" width="230" height="30" border="0" /></div>
      <div class="jobs4">
        <ul>
          <?php foreach($kjzc as $p):?>
          <li class="w180">
          <a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>" target="_blank">
            <?=$p['Post']['post_title']?>
          </a>
          </li>
          <?php endforeach;?>
        </ul>
      </div>
      <div><img src="/jbyx/img/index_39.png" width="230" height="20" /></div>
    </div>
    <div class="newssamll">
      <div class="title"><img src="/jbyx/img/index_35.png" width="230" height="30" border="0" /></div>
      <div class="jobs4">
        <ul>
          <?php foreach($jxlt as $p):?>
          <li class="w180">
          <a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>" target="_blank">
            <?=$p['Post']['post_title']?>
          </a>
          </li>
          <?php endforeach;?>
        </ul>
      </div>
      <div><img src="/jbyx/img/index_39.png" width="230" height="20" /></div>
    </div>
    <div class="newssamll">
      <div class="title"><img src="/jbyx/img/index_36.png" width="230" height="30" border="0" /></div>
      <div class="jobs4">
        <ul>
          <?php foreach($jjfx as $p):?>
          <li class="w180">
          <a href="/app/content/<?=$p['Post']['id']?>" title="<?=$p['Post']['post_title']?>" target="_blank">
            <?=$p['Post']['post_title']?>
          </a>
          </li>
          <?php endforeach;?>
        </ul>
      </div>
      <div><img src="/jbyx/img/index_39.png" width="230" height="20" /></div>
    </div>
    <div class="wsdc">
      <div class="title"><img src="/jbyx/img/index_37.png" width="230" height="30" border="0" /></div>
      <div class="jobs4">
        <ul>
          <?php foreach($polls as $p):?>
          <li class="w180"><a href="/app/vote/<?=$p['Polls']['id']?>"><?=$p['Polls']['question']?></a></li>
          <?php endforeach;?>
        </ul>
      </div>
      <div><img src="/jbyx/img/index_39.png" width="230" height="20" /></div>
    </div>
  </div>
  <div class="jiange20"></div>
</div>
</div>
