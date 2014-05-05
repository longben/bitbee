<?php
echo $this->Form->create('Airport', array(
    'id' => 'fm',
    'class' => 'formee',
    'inputDefaults' => array('class'=> 'textbox', 'div' => array('class' => 'grid-12-12'))
));
//Line 1
echo $this->Form->hidden('id');
echo $this->Form->input('name', array(
    'label' => '机场名称',
    'div' => array('class' => 'grid-5-12'),
    'class' => 'easyui-validatebox',
    'data-options' => 'required:true'
));
echo $this->Form->input('area_id', array(
    'label' => '所属地区',
    'div' => array('class' => 'grid-2-12'),
    'options' => $areas
));
echo $this->Form->input('active_time', array(
    'label' => '启用时间',
    'class' => 'easyui-datebox easyui-validatebox',
    'type' => 'text',
    'data-options' => 'height:"100%"',
    'div' => array('class' => 'grid-2-12')
));
echo $this->Form->input('investor', array(
    'label' => '投资主体',
    'div' => array('class' => 'grid-3-12'),
    'options' => array(1 => '国家', 2 => '地方政府', 3 => '企业')
));

//Line 2
echo $this->Form->input('airport_type', array(
    'label' => '机场类型',
    'div' => array('class' => 'grid-3-12 clear'),
    'options' => array(1 => '永久机场', 2 => '临时机场')
));
echo $this->Form->input('grade', array(
    'label' => '机场等级',
    'div' => array('class' => 'grid-3-12'),
    'options' => array(1 => '一类通用机场（10-29座）', 2 => '二类通用机场（5-9座）', 3 => '三类通用机场')
));
echo $this->Form->input('coordinate', array(
    'label' => '坐标',
    'div' => array('class' => 'grid-3-12')
));
echo $this->Form->input('elevation', array(
    'label' => '标高',
    'div' => array('class' => 'grid-3-12')
));

//Line3
echo $this->Form->input('runway_spec', array(
    'label' => '跑道规格',
    'div' => array('class' => 'grid-3-12 clear')
));
echo $this->Form->input('parking_spec', array(
    'label' => '停机坪规格及位置',
    'div' => array('class' => 'grid-3-12')
));
echo $this->Form->input('runway_heading', array(
    'label' => '跑道方向',
    'div' => array('class' => 'grid-3-12')
));
echo $this->Form->input('obstacle_clearance', array(
    'label' => '净空条件',
    'div' => array('class' => 'grid-3-12')
));

//Line4
echo $this->Form->input('position', array(
    'label' => '机场位置',
    'div' => array('class' => 'grid-3-12 clear')
));
echo $this->Form->input('alternate_airport', array(
    'label' => '备降机场',
    'div' => array('class' => 'grid-3-12')
));
echo $this->Form->input('distance', array(
    'label' => '离重要线路（国境线、国道等）距离',
    'div' => array('class' => 'grid-4-12')
));
echo $this->Form->input('telphone', array(
    'label' => '联系电话',
    'div' => array('class' => 'grid-2-12')
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

<script type="text/javascript">
function submitForm(){
    $('#fm').form('submit');
}
function clearForm(){
    $('#fm').form('reset');
}

var url;
function saveItem(){
    $('#fm').form('submit',{
        url: '/admin/ga/airports/save',
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.success){
                $.messager.confirm('Confirm', '你是否要继续添加企业信息？', function(r){
                    if (r){
                        window.location = '/admin/ga/airports/add';
                    }else{
                        window.location = '/admin/ga/airports/index';
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
