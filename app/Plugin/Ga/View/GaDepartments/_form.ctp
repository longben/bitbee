<link rel="stylesheet" href="/css/select2/select2.css">

<div class="gh_zy_left">
    <div class="gh_zy_left1"></div>
</div>


<div class="gh_zy_contact">
    <div class="gh_zy_right">
<?php
echo $this->Form->create('GaDepartment', array(
    'action' => 'add',
    'id' => 'fm',
    'class' => 'formee',
    'inputDefaults' => array('class'=> 'textbox', 'div' => array('class' => 'grid-12-12'))
));
//Line 1
echo $this->Form->input('id', array('id' => 'id'));
echo $this->Form->hidden('parent_id', array('value' => $this->Session->read('Auth.User.Meta.department_id')));
echo $this->Form->input('name', array(
    'label' => '企业名称',
    'div' => array('class' => 'grid-4-12'),
    'class' => 'easyui-validatebox',
    'data-options' => 'required:true'
));
echo $this->Form->input('Meta.area_id', array(
    'label' => '所属地区',
    'div' => array('class' => 'grid-2-12'),
    'options' => $areas
));
echo $this->Form->input('Meta.corporation', array(
    'label' => '法人代表',
    'div' => array('class' => 'grid-2-12'),
    'class' => 'easyui-validatebox',
    'data-options' => 'required:true'
));
echo $this->Form->input('Meta.registered_capital_c', array(
    'label' => '注册资本',
    'div' => array('class' => 'grid-4-12'),
    'onFocus' => 'change2Arab()',
    'onBlur' => 'change2Chinese()'
));
echo $this->Form->hidden('Meta.registered_capital');


//Line 2
echo $this->Form->input('region_id', array(
    'default' => 1,
    'label' => '省(市)自治区',
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
    'default' => 1,
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
    'label' => '企业类别(大类)',
    'options' => $qylb1,
    'div' => array('class' => 'grid-2-12 clear'),
    'onChange' => "showChildren(this.value,'#GaDepartmentDeptAttributeId','/codes/children.xml')"
));
echo $this->Form->input('dept_attribute_id', array(
    'options' => $qylb2,
    'label' => '企业类别(小类)',
    'div' => array('class' => 'grid-4-12')
));
echo $this->Form->input('Meta.licence', array(
    'required' => true,
    'label' => '经营许可证号码',
    'between' => '民航通企字',
    'after' => '号',
    'class' => 'n',
    'div' => array('class' => 'grid-2-12')
));
echo $this->Form->input('Meta.scope', array(
    'label' => '经营项目与范围',
    'div' => array('class' => 'grid-4-12'),
    'multiple' => true,
    //'class' => 'chosen-select'
));

//Line 4
echo $this->Form->input('Meta.issuing_authority', array(
    'label' => '发证机关',
    'div' => array('class' => 'grid-4-12 clear'),
    'options' => $parents
));
echo $this->Form->input('Meta.start_date', array(
    'label' => '有效期限（起）',
    'class' => 'easyui-datebox easyui-validatebox',
    'type' => 'text',
    'data-options' => 'height:"100%"',
    'div' => array('class' => 'grid-2-12')
));
echo $this->Form->input('Meta.end_date', array(
    'label' => '有效期限（止）',
    'class' => 'easyui-datebox easyui-validatebox',
    'type' => 'text',
    'data-options' => 'height:"100%", validType:"abc[\'#MetaStartDate\']"',
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
?>
<label>
    <span>&nbsp;</span>
</label>
<br/>
<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-save'" onclick="saveItem()">保存</a>


<?php
//Line 5
echo $this->Form->end();
?>

</div>
</div>

<script src="/js/jquery/select2/select2.js" type="text/javascript"></script>

<?php echo $this->fetch('js'); ?>
