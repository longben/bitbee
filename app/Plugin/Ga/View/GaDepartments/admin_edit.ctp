<style>
#MetaLicence{
    width: 50%;
}
</style>

<link rel="stylesheet" href="/css/chosen/docsupport/prism.css">
<link rel="stylesheet" href="/css/chosen/chosen.css">

<script type="text/javascript">
/*
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
</script>

<div id="p" class="easyui-panel" title="Basic Panel" style="width:auto;height:auto;padding:10px;">
<?php
echo $this->Form->create('GaDepartment', array(
    'action' => 'add',
    'id' => 'fm',
    'class' => 'formee',
    'inputDefaults' => array('class'=> 'textbox', 'div' => array('class' => 'grid-12-12'))
));
//Line 1
echo $this->Form->input('id', array('id' => 'id'));
echo $this->Form->input('name', array(
    'required' => true,
    'label' => '企业名称',
    'div' => array('class' => 'grid-5-12')
));
echo $this->Form->input('parent_id', array(
    'label' => '所属地区',
    'div' => array('class' => 'grid-2-12'),
    'options' => $areas
));
echo $this->Form->input('Meta.corporation', array(
    'required' => true,
    'label' => '法人代表',
    'div' => array('class' => 'grid-2-12')
));
echo $this->Form->input('Meta.registered_capital', array(
    'required' => true,
    'label' => '注册资本',
    'div' => array('class' => 'grid-3-12')
));


//Line 2
echo $this->Form->input('region_id', array(
    'default' => 1,
    'label' => '地区',
    'div' => array('class' => 'grid-2-12 clear'),
    'onChange' => "showCity(this.value,'#GaDepartmentCityId','/regions/city.xml')"
));
echo $this->Form->input('city_id', array(
    'default' => 1,
    'label' => '城市',
    'div' => array('class' => 'grid-2-12')
));
echo $this->Form->input('dept_character_id', array(
    'default' => 0,
    'label' => '非民企',
    'div' => array('class' => 'grid-2-12'),
    'options' => array( 0 => '否', 1 => '是')
));
echo $this->Form->input('Meta.status', array(
    'default' => 1001000000,
    'label' => '经营状态',
    'div' => array('class' => 'grid-2-12'),
    'options' => array(1 => '运行', 2 => '筹建', 3 => '注销筹建', 4 => '注销经营许可')
));
echo $this->Form->input('Meta.airport', array(
    'label' => '基地机场',
    'div' => array('class' => 'grid-4-12')
));

//Line 3
echo $this->Form->input('dept_type_id', array(
    'label' => '企业类别',
    'div' => array('class' => 'grid-2-12 clear'),
    'options' => $qylb1,
    'onChange' => "showChildren(this.value,'#GaDepartmentDeptAttributeId','/codes/children.xml')"
));
echo $this->Form->input('dept_attribute_id', array(
    'default' => 1,
    'label' => '.',
    'options' => $qylb2,
    'div' => array('class' => 'grid-3-12')
));
echo $this->Form->input('Meta.licence', array(
    'required' => true,
    'label' => '经营许可证号码',
    'between' => '民航通企字',
    'after' => '号',
    'div' => array('class' => 'grid-3-12')
));
echo $this->Form->input('Meta.scope', array(
    'label' => '经营项目与范围',
    'div' => array('class' => 'grid-4-12'),
    'multiple' => true,
    'options' => $parents,
    'class' => 'chosen-select'
));

//Line 4
echo $this->Form->input('Meta.issuing_authority', array(
    'label' => '发证机关',
    'div' => array('class' => 'grid-4-12 clear'),
    'options' => $parents
));
echo $this->Form->input('Meta.start_date', array(
    'label' => '有效期限（起）',
    'class' => 'easyui-datebox',
    'type' => 'text',
    'data-options' => 'height:"100%"',
    'div' => array('class' => 'grid-2-12')
));
echo $this->Form->input('Meta.end_date', array(
    'label' => '有效期限（止）',
    'class' => 'easyui-datebox',
    'type' => 'text',
    'data-options' => 'height:"100%"',
    'div' => array('class' => 'grid-2-12')
));
echo $this->Form->input('Meta.issuance_date', array(
    'label' => '颁发日期',
    'class' => 'easyui-datebox',
    'type' => 'text',
    'data-options' => 'height:"100%"',
    'div' => array('class' => 'grid-2-12')
));
echo $this->Form->input('Meta.renewal_date', array(
    'label' => '换证日期',
    'class' => 'easyui-datebox',
    'type' => 'text',
    'data-options' => 'height:"100%"',
    'div' => array('class' => 'grid-2-12')
));

//Line 5
echo $this->Form->end(array(
    'label' => 'Create',
    'class' => 'right',
    'div' => array('class' => 'grid-12-12')
));
?>
</div>

<script type="text/javascript">
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

</script>

<script src="/js/jquery/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="/js/jquery/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
var config = {
    '.chosen-select'           : {},
    '.chosen-select-deselect'  : {allow_single_deselect:true},
    '.chosen-select-no-single' : {disable_search_threshold:10},
    '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
    '.chosen-select-width'     : {width:"95%"}
}
for (var selector in config) {
        $(selector).chosen(config[selector]);
}

var sels = "<?=$this->data['Meta']['scope']?>";
sels = sels.split(',');
for (var sel in sels) {
    $("#MetaScope option[value=" + sels[sel] + "]").attr('selected', 'selected');
}
$('#MetaScope').trigger('chosen:updated');
</script>

