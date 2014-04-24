var targetSelect;
function showCity(proId,targetSel,http){
    var sendData = "data[Department][region_id]=" + proId;
    targetSelect = $(targetSel);

    $.ajax({
        type: "POST",
        url: http,
        data: sendData,
        dataType: "xml",
        success: function(xml){
            targetSelect.find('option').remove();
            property = $(xml).find("cities");
            if(property.length >0){//对应的省份有城市信息则显示
                for (var i=0,x=1;i<property.length;i++,x++){
                    name = $("name",property[i]).text();
                    value = $("id",property[i]).text();
                    targetSelect.append('<option value="'+ value +'">'+ name +'</option>');
                }
            }
        }
    });
}

$('.chosen-select').chosen({
    placeholder_text_multiple:'请选择项目与范围',
    search_contains:true,
    no_results_text: "没有匹配的结果："
});

$.extend($.fn.validatebox.defaults.rules, {
    abc: {
        validator: function(value,param){
            return value > $(param[0]).datebox('getValue');
        },
        message: '“有效期限（止）” 不能晚于 “有效期限（起）”'
    }
});

/* 处理键盘事件
   $(function () {
   $('input:text:first').focus();
   var $inp = $('input:text');
   $inp.bind('keydown', function (e) {
   var key = e.which;
   if (key == 13) {
   e.preventDefault();
   var nxtIdx = $inp.index(this) + 1;
   $(":input:text:eq(" + nxtIdx + ")").focus();
   }
   });
   });
   */

function submitForm(){
    $('#fm').form('submit');
}
function clearForm(){
    $('#fm').form('reset');
}

var url;
function saveItem(){
    $('#fm').form('submit',{
        url: '/admin/ga/ga_departments/save',
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.success){
                $.messager.confirm('Confirm', '你是否要继续添加企业信息？', function(r){
                    if (r){
                        window.location = '/admin/ga/ga_departments/add'
                    }
                });
            } else {
                $.messager.show({
                    title: 'Error',
                    msg: result.msg
                });
            }
        }
    });
}


//修改注册资本显示方式
function change2Chinese(){
    if (/^(0|[1-9]\d*)(\.\d+)?$/.test($('#MetaRegisteredCapitalC').val())){
        $('#MetaRegisteredCapital').val($('#MetaRegisteredCapitalC').val());
        $('#MetaRegisteredCapitalC').val(Arab2Chinese($('#MetaRegisteredCapital').val()));
    }
}

function change2Arab(){
    if (!/^(0|[1-9]\d*)(\.\d+)?$/.test($('#MetaRegisteredCapitalC').val())){
        $('#MetaRegisteredCapitalC').val($('#MetaRegisteredCapital').val());
    }
}
