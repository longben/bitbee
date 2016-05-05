<?php
    echo $this->Html->script(array('jquery/easyui/jquery.easyui.min' , 'jquery/easyui/locale/easyui-lang-zh_CN','formee/formee'), array('inline' => false));
    echo $this->Html->css(array('easyui/themes/metro/easyui', 'easyui/themes/icon','formee/formee-style', 'formee/formee-structure'), 'stylesheet', array('inline' => false));
?>
<div class="ct">
  <div class="rightnav">
    <div class="samllnav"><?=$booking['Booking']['start_time']?></div>
  </div>
  <div class="title"><?=$booking['Booking']['name']?></div>
  <div class="columnboxlistnews">
    <?=$booking['Booking']['remark']?>

    <?php if($booking['Booking']['discount']==0):?>
    <h2 align="center">本轮讲座票已抢完，敬请期待下一期讲座。</h2>
    <?php elseif( date("Y-m-d H:i:s") < date("Y-m-d H:i:s", strtotime($booking['Booking']['start_time']))):?>
    <h2 align="center"><?=$booking['Booking']['start_time']?>开始抢票，敬请期待。</h2>
    <?php else:?>
    <?php echo $this->Form->create('BookingOrder', array('url' => '/app/booking', 'class' => 'formee'));?>
    <input name="data[BookingOrder][booking_id]" value="1" type="hidden">
    <fieldset>
        <legend>抢票</legend>
        <div class="grid-12-12">
            <label for="id_username">学生姓名：</label>
            <input name="data[BookingOrder][student]" maxlength="75"  required="1"  id="user_login" type="text">
        </div>
        <div class="grid-12-12">
            <label for="id_password">所在班级：</label>
            <select id="BookingOrderBookingId" name="data[BookingOrder][class]" required="1">
               <option value=""></option>
               <option value="小一班">小一班</option>
               <option value="小二班">小二班</option>
               <option value="小三班">小三班</option>
               <option value="小四班">小四班</option>
               <option value="小五班">小五班</option>
               <option value="小六班">小六班</option>
               <option value="中一班">中一班</option>
               <option value="中二班">中二班</option>
               <option value="中三班">中三班</option>
               <option value="中四班">中四班</option>
               <option value="大一班">大一班</option>
               <option value="大二班">大二班</option>
               <option value="大三班">大三班</option>
               <option value="大四班">大四班</option>
               <option value="大五班">大五班</option>
               <option value="大六班">大六班</option>
               <option value="小中班">小中班</option>
               <option value="小小班">小小班</option>
            </select>
        </div>
        <div class="grid-12-12">
            <label for="id_password">家长手机：</label>
            <input name="data[BookingOrder][phone]" id="phone" type="text" required="1" data-options="validType:'phoneRex'" class="easyui-validatebox">
        </div>
        <div class="grid-6-12 right">
            <?php echo $this->Session->flash();?>
            <input class="green_button" value="抢票" type="submit">
        </div>
    </fieldset>
    <?php endif;?>
    <?php echo $this->Form->end();?>
  </div>
  <div class="gbbox">

  </div>
</div>


<script>

   //自定义验证
  $.extend($.fn.validatebox.defaults.rules, {
  phoneRex: {
    validator: function(value){
    var rex=/^1[3-8]+\d{9}$/;
    //var rex=/^(([0\+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/;
    //区号：前面一个0，后面跟2-3位数字 ： 0\d{2,3}
    //电话号码：7-8位数字： \d{7,8
    //分机号：一般都是3位数字： \d{3,}
     //这样连接起来就是验证电话的正则表达式了：/^((0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/
    var rex2=/^((0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/;
    if(rex.test(value)||rex2.test(value))
    {
      // alert('t'+value);
      return true;
    }else
    {
     //alert('false '+value);
       return false;
    }

    },
    message: '请输入正确电话或手机格式'
  }
});
</script>
