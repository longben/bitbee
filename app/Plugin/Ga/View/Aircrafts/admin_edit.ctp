<link rel="stylesheet" href="/css/chosen/docsupport/prism.css">
<link rel="stylesheet" href="/css/chosen/chosen.css">

<?php
echo $this->Form->create('Aircraft', array(
    'id' => 'fm',
    'class' => 'formee',
    'inputDefaults' => array('class'=> 'textbox', 'div' => array('class' => 'grid-12-12'))
));
//Line 1
echo $this->Form->hidden('id');
echo $this->Form->hidden('Corp.id');
echo $this->Form->input('Corp.department_id', array(
    'label' => '企业名称',
    'div' => array('class' => 'grid-5-12'),
    'class' => 'easyui-validatebox',
    'data-options' => 'required:true'
));
echo $this->Form->input('Corp.area_id', array(
    'label' => '所属地区',
    'div' => array('class' => 'grid-2-12'),
    'options' => $areas
));
echo $this->Form->input('Corp.registration_no', array(
    'label' => '国籍登记证(含临时登记证)编号',
    'div' => array('class' => 'grid-3-12'),
    'class' => 'easyui-validatebox',
    'value' => 'NR'
));
echo $this->Form->input('Corp.registration_flag', array(
    'label' => '国籍和登记标志',
    'div' => array('class' => 'grid-2-12'),
    'value' => 'B-'
));


//Line 2
echo $this->Form->input('type', array(
    'label' => '航空器类型',
    'div' => array('class' => 'grid-2-12 clear'),
    'type' => 'select'
));
echo $this->Form->input('brand', array(
    'label' => '制造人',
    'div' => array('class' => 'grid-3-12'),
    'onChange' => "showChildren(this.value,'#AircraftModel','/codes/children.xml')"
));
echo $this->Form->input('model', array(
    'label' => '型号',
    'type' => 'select',
    'div' => array('class' => 'grid-2-12')
));
echo $this->Form->input('Corp.purpose', array(
    'label' => '主要用途',
    'div' => array('class' => 'grid-5-12'),
    'multiple' => true,
    'options' => $areas,
    'class' => 'chosen-select'
));

//Line 3
echo $this->Form->input('oil_type', array(
    'label' => '燃油种类',
    'div' => array('class' => 'grid-2-12 clear'),
    'options' => array('jet fuel' => '航空煤油', 'avgas' => '航空汽油')
));
echo $this->Form->input('netweight', array(
    'label' => '空重',
    'div' => array('class' => 'grid-2-12')
));
echo $this->Form->input('max_load', array(
    'label' => '最大起飞全重',
    'div' => array('class' => 'grid-2-12')
));
echo $this->Form->input('kts', array(
    'label' => '最大巡航速度',
    'div' => array('class' => 'grid-2-12')
));
echo $this->Form->input('maximum_range', array(
    'label' => '最大航程',
    'div' => array('class' => 'grid-2-12')
));
echo $this->Form->input('passenger_capacity', array(
    'label' => '载员人数',
    'div' => array('class' => 'grid-2-12')
));

//Line 4
echo $this->Form->input('Corp.register_date', array(
    'label' => '登记日期',
    'class' => 'easyui-datebox easyui-validatebox',
    'type' => 'text',
    'data-options' => 'height:"100%"',
    'div' => array('class' => 'grid-2-12 clear')
));
echo $this->Form->input('Corp.age', array(
    'label' => '机龄',
    'div' => array('class' => 'grid-2-12')
));
echo $this->Form->input('Corp.procure_method', array(
    'label' => '获得方式',
    'div' => array('class' => 'grid-2-12'),
    'options' => array('1' => '购买', '2' => '租赁', '3' => '代管', '4' => '其他')
));
echo $this->Form->input('Corp.procure_date', array(
    'label' => '获得时间',
    'class' => 'easyui-datebox easyui-validatebox',
    'type' => 'text',
    'data-options' => 'height:"100%"',
    'div' => array('class' => 'grid-2-12')
));
echo $this->Form->input('Corp.status', array(
    'label' => '使用状态',
    'div' => array('class' => 'grid-2-12'),
    'options' => array('1' => '运行', '2' => '暂停', '3' => '终止')
));
echo $this->Form->input('Corp.maintenance', array(
    'label' => '维护情况',
    'div' => array('class' => 'grid-2-12'),
    'options' => array('1' => '难', '2' => '中等', '3' => '易')
));
//Line6
echo $this->Form->input('Corp.procure_method', array(
    'label' => '承担主要飞行种类和任务',
    'div' => array('class' => 'grid-4-12 clear'),
    'multiple' => true,
    'options' => $areas,
    'class' => 'chosen_procure_method'
));
echo $this->Form->input('Corp.zysg_zh_cs', array(
    'label' => '投入使用以来主要事故或征候次数',
    'div' => array('class' => 'grid-4-12')
));
echo $this->Form->input('Corp.damaged', array(
    'label' => '因失事、失踪等原因毁损航空器情况',
    'div' => array('class' => 'grid-4-12')
));
?>

<div class="grid-12-12">
<span class="right">
<a href="javascript:void(0)" class="easyui-linkbutton" onclick="history.go(-1)">返回列表</a>
<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save',size:'large'" onclick="saveItem()">保存</a>
</span>
</div>

<?php
//Line 5
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

$('.chosen_procure_method').chosen({
    placeholder_text_multiple:'请选择承担主要飞行种类或任务',
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


function submitForm(){
    $('#fm').form('submit');
}
function clearForm(){
    $('#fm').form('reset');
}

var url;
function saveItem(){
    $('#fm').form('submit',{
        url: '/admin/ga/aircrafts/save',
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.success){
                $.messager.confirm('Confirm', '你是否要继续添加企业信息？', function(r){
                    if (r){
                        window.location = '/admin/ga/aircrafts/add';
                    }else{
                        window.location = '/admin/ga/aircrafts/index';
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
