<link rel="stylesheet" href="/css/chosen/docsupport/prism.css">
<link rel="stylesheet" href="/css/chosen/chosen.css">

<?php
echo $this->Form->create('Assignment', array(
    'id' => 'fm',
    'class' => 'formee',
    'inputDefaults' => array('class'=> 'textbox', 'div' => array('class' => 'grid-12-12'))
));
//Line 1
echo $this->Form->hidden('id');
echo $this->Form->input('assignment_date', array(
    'label' => '作业日期',
    'class' => 'easyui-datebox easyui-validatebox',
    'div' => array('class' => 'grid-3-12'),
    'type' => 'text',
    'data-options' => 'height:"100%"'
));
echo $this->Form->input('department_id', array(
    'label' => '企业名称',
    'class' => 'easyui-validatebox',
    'div' => array('class' => 'grid-9-12'),
    'data-options' => 'required:true'
));
echo $this->Form->input('area_id', array(
    'label' => '所属地区'
));
echo $this->Form->input('assignment_type', array(
    'label' => '作业类型',
    'multiple' => true,
    'options' => $areas,
    'class' => 'chosen-select'
));
echo $this->Form->input('assignment_hour', array(
    'label' => '飞行小时量',
    'div' => array('class' => 'grid-6-12 clear'),
    'class' => 'easyui-validatebox'
));
echo $this->Form->input('assignment_time', array(
    'label' => '飞行架次',
    'div' => array('class' => 'grid-6-12')
));

?>

<div class="grid-12-12">
<span class="right">
<a href="javascript:void(0)" class="easyui-linkbutton" onclick="history.go(-1)">返回列表</a>
<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',size:'large'" onclick="saveItem()">保存</a>
</span>
</div>

<?php
echo $this->Form->end();
?>

<script src="/js/jquery/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="/js/jquery/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
$('.chosen-select').chosen({
    placeholder_text_multiple:'请选择主要用途',
    search_contains:true,
    no_results_text: "没有匹配的结果："
});


var sels = "<?=$this->data['Assignment']['assignment_type']?>";
sels = sels.split(',');
for (var sel in sels) {
    $("#AssignmentAssignmentType option[value=" + sels[sel] + "]").attr('selected', 'selected');
}
$('#AssignmentAssignmentType').trigger('chosen:updated');


function submitForm(){
    $('#fm').form('submit');
}
function clearForm(){
    $('#fm').form('reset');
}

var url;
function saveItem(){
    $('#fm').form('submit',{
        url: '/admin/ga/assignments/save',
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.success){
                $.messager.confirm('Confirm', '你是否要继续添加企业信息？', function(r){
                    if (r){
                        window.location = '/admin/ga/assignments/add';
                    }else{
                        window.location = '/admin/ga/assignments/index';
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

</script>
