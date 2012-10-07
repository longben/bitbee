<div class="content" style="margin-top:10px;margin-bottom:10px;">
<div class="pannelTop" >
      <div class="pannelTopLeft"></div>
      <div class="pannelTopBg" style="width:98%;"></div>
      <div class="pannelTopRight"></div>
    </div>

    <div class="pannelMiddel">
        <div class="pannelMidLeft" style="height:440px;" id="mainheightleft"></div>
        <div class="pannelMidBg" style="width:98%; height:auto !important; height:480px; min-height:480px;" id="mainheight">
            <div class="Contents">
              <table width="882" border="0" align="center" cellpadding="1" cellspacing="1">
                <tr bgcolor="#000000">
                  <th width="438" height="30" align="center" bgcolor="#FFFFFF" scope="col">填表家长：<?=$c['CourseMembership']['patriarch']?> </th>
                  <th width="439" align="center" bgcolor="#FFFFFF" scope="col"><span class="ConDates"><strong>填表日期：</strong><?=$c['CourseMembership']['date_of_filing']?></span></th>
                </tr>
                <tr bgcolor="#000000">
                  <th colspan="2" scope="col"><table width="880" border="0" align="center" cellpadding="3" cellspacing="1">
                    <tr>
                      <th height="50" colspan="2" bgcolor="#FFFFFF" scope="col">名称</th>
                      <th bgcolor="#FFFFFF" scope="col">内容</th>
                    </tr>
                    <tr>
                      <th colspan="2" bgcolor="#FFFFFF" scope="row">课程名称</th>
                      <td bgcolor="#FFFFFF"><?=$c['Course']['name']?></td>
                    </tr>
                    <tr>
                      <th rowspan="5" align="center" valign="middle" bgcolor="#FFFFFF" scope="row"><p>家</p>
                        <p>长</p>
                        <p>填</p>
                        <p>写</p></th>
                      <td rowspan="3" bgcolor="#FFFFFF">宝宝在活动中的情感态度</td>
                      <td bgcolor="#FFFFFF">
                          <p>1、宝宝今天上课对哪项活动最感兴趣：</p>
                          <p><?=$c['CourseMembership']['interest']?></p>
                      </td>
                    </tr>
                    <tr>
                      <td bgcolor="#FFFFFF"><p>2、宝宝今天上课什么地方不一样：</p>
                        <p><?=$c['CourseMembership']['different']?></p></td>
                    </tr>
                    <tr>
                      <td bgcolor="#FFFFFF"><p>3、宝宝今天让你印象最深刻的是：</p>
                        <p><?=$c['CourseMembership']['impression']?></p></td>
                    </tr>
                    <tr>
                      <td bgcolor="#FFFFFF">家庭延伸情况</td>
                      <td bgcolor="#FFFFFF"><p>家长是否有做上一节课的家庭延伸：</p>
                        <p><?=$c['CourseMembership']['extend']==1?'有':'没有'?></p></td>
                    </tr>
                    <tr>
                      <td bgcolor="#FFFFFF">您的意见和建议</td>
                      <td height="80" bgcolor="#FFFFFF"><?=$c['CourseMembership']['suggest']?></td>
                    </tr>
                    <tr>
                      <th align="center" valign="middle" bgcolor="#FFFFFF" scope="row"><p>教</p>
                        <p>师</p>
                        <p>填</p>
                        <p>写</p></th>
                      <td bgcolor="#FFFFFF">宝宝在活动中的具体表现</td>
                      <td height="200" bgcolor="#FFFFFF"><?=$c['CourseMembership']['expression']?></td>
                    </tr>
                  </table></th>
                </tr>
              </table>
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
