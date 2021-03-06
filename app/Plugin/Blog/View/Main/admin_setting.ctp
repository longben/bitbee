<div style="width:800px" class="formee">

    <fieldset>
        <legend>设置博客头像</legend>
        <div align="center">
            <object id="ImagesUpload" width="670" height="240" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10.0.32" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="ImagesUpload">
                <param value="#666666" name="bgColor">
                <param value="/img/ImagesUpload.swf?img=/upload/user/avatar/<?=$user['Meta']['avatar']?>&w=180&h=180" name="movie">
                <param value="url=/users/avatar" name="flashvars">
                <param value="high" name="quality">
                <param value="always" name="allowScriptAccess">
                <param value="transparent" name="WMODE">
                <embed width="670" height="240" wmode="transparent" type="application/x-shockwave-flash" flashvars="url=/users/avatar" pluginspage="http://www.macromedia.com/go/getflashplayer" quality="high" src="/img/ImagesUpload.swf?img=/upload/user/avatar/<?=$user['Meta']['avatar']?>&w=180&h=180" name="ImagesUpload">
            </object>
        </div>
    </fieldset>

    <fieldset>
        <legend>设置博客大图封面</legend>
        <div align="center">
            <object id="ImagesUpload2" width="1500" height="350" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10.0.32" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="ImagesUpload2">
                <param value="#666666" name="bgColor">
                <param value="/img/ImagesUpload.swf?img=/upload/user/avatar/<?=$user['Meta']['site_header']?>&w=1000&h=288" name="movie">
                <param value="url=/users/site_header" name="flashvars">
                <param value="high" name="quality">
                <param value="always" name="allowScriptAccess">
                <param value="transparent" name="WMODE">
                <embed width="1500" height="350" wmode="transparent" type="application/x-shockwave-flash" flashvars="url=/users/site_header" pluginspage="http://www.macromedia.com/go/getflashplayer" quality="high" src="/img/ImagesUpload.swf?img=/upload/user/avatar/<?=$user['Meta']['site_header']?>&w=1000&h=288" name="ImagesUpload2">
            </object>
        </div>
    </fieldset>


    <?php echo $this->Form->create('User', array('url' => '/admin/blog/main/setting', 'class' => 'formee'));?>
    <fieldset>
        <legend>设置博客信息</legend>
        <div class="grid-12-12">
            <label for="id_username">站点标题</label>
            <input name="data[Meta][site_title]" maxlength="75" autocapitalize="off" autocorrect="off" class="easyui-validatebox" required="1"  id="user_login" type="text" value="<?=$user['Meta']['site_title']?>">
        </div>
        <div class="grid-12-12">
            <label for="id_password">副标题</label>
            <input name="data[Meta][site_tagline]" id="UserPassword" type="text" class="easyui-validatebox" required="1" value="<?=$user['Meta']['site_tagline']?>">
        </div>

        <div class="grid-12-12">
            <label for="id_password">文章分类</label>
            <label><a href="javascript:;" id="add">添加</a> | <a href="#" id="remove">删除</a></label>
            <div class="inputs">
                <?php foreach($menus as $i => $menu):?>
                <div><input type="text" class="field mm" id="menu" name="data[Menu][<?=$i?>][name]" value="<?php echo $menu['Menu']['name']?>"/></div>
                <div><input type="hidden" name="data[Menu][<?=$i?>][id]" value="<?php echo $menu['Menu']['id']?>"/></div>
                <?php endforeach;?>
            </div>
        </div>
        <div class="grid-2-12 right">
            <?php echo $this->Session->flash(); echo $this->Session->flash('auth');?>
            <input class="green_button" value="保存" type="submit">
        </div>
    </fieldset>
    <?php echo $this->Form->end();?>



</div>



<script>
    function uploadEnd(res){
        if(res != ""){
            res = res.replace(/[\r]/g,"");
            res = res.replace(/[\n]/g,"");
            var imgUrl = "/meise/user/avatar/"+ res + '?r=' + Math.random();
            $("#avatar").attr("src", imgUrl);
            alert("保存成功。");
            }else{
            alert("保存失败。");
        }
    }

    function addPic(pic){
        $.post(
        '/meise/users/avatar2',
        {'data[User][avatar]': pic},
        function(result){
            $("#avatar").attr("src", "/meise/user/avatar/" + pic);
        });
    }


    $(document).ready(function(){


        var i = $('.mm').size();

        $('#add').click(function() {
            $('<div><input type="text" class="field mm" id="menu" name="data[Menu][' + i  + '][name]" /></div>').fadeIn('slow').appendTo('.inputs');
            i++;
        });

        $('#remove').click(function() {
            if(i > 1) {
                $('.field:last').remove();
                i--; 
            }
        });

        $('#reset').click(function() {
            while(i > 2) {
                $('.field:last').remove();
                i--;
            }
        });


        // here's our click function for when the forms submitted

        $('.submit').click(function(){


            var answers = [];
            $.each($('.field'), function() {
                answers.push($(this).val()); 
            });

            if(answers.length == 0) { 
                answers = "none"; 
            }   

            alert(answers);

            return false;

        });



    });

</script>
