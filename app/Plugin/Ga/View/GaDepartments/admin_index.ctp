<table id="dg"></table>

<div id="toolbar">
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-add', plain:true"  onclick="newItem()">新增</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-edit', plain:true"  onclick="editItem()">编辑</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-tip', plain:true"  onclick="deleteItem()">删除</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-tip', plain:true"  onclick="searchItem()">查询</a>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-tip', plain:true"  onclick="searchItem()">导出</a>

    <span style="float:right;white-space:nowrap;clear:none;overflow:hidden; page-break-before: always;page-break-after: always;width:300px">
        <input class="easyui-searchbox" data-options="prompt:'请输入查询条件',menu:'#mm',searcher:function(value,name){search(value, name)}" style="width:300px"></input>
        <div id="mm" style="width:120px">
            <div data-options="name:'GaDepartment.name',iconCls:'icon-user'">企业名称</div>
        </div>
        <input class="easyui-searchbox" data-options="prompt:'请输入查询条件',menu:'#mm2',searcher:function(value,name){search(value, name)}" style="width:300px"></input>
        <div id="mm2" style="width:120px">
            <div data-options="name:'GaDepartment.name',iconCls:'icon-user'">企业名称</div>
        </div>
    </span>
</div>

<div id="dlg" class="easyui-dialog" title="查询"
    data-options="iconCls:'icon-save',closed:'true'" style="width:780px;height:200px;padding:10px" buttons="#dlg-buttons">
        <?php echo $this->Form->create('GaDepartment', array(
            'action' => 'search',
            'id' => 'fm',
            'inputDefaults' => array( 'div' => false, 'label' => false)
        ));
        ?>
        <table width="100%">
            <tr>
                <td>所属地区:</td>
                <td><?=$this->Form->input('area_id', array('options' => $areas))?></td>
                <td>省份:</td>
                <td><?=$this->Form->input('region_id')?></td>
                <td>经营项目与范围:</td>
                <td><?=$this->Form->input('scope')?></td>
            </tr>
            <tr>
                <td>颁证日期(起):</td>
                <td><?=$this->Form->input('dd', array('class' => 'easyui-datebox'))?></td>
                <td></td>
                <td></td>
                <td>经营状态:</td>
                <td><?=$this->Form->input('Meta.status')?></td>
            </tr>
            <tr>
                <td>颁证日期(止):</td>
                <td><?=$this->Form->input('dd2', array('class' => 'easyui-datebox'))?></td>
                <td></td>
                <td></td>
                <td>关键字:</td>
                <td><?=$this->Form->input('keyword')?></td>
            </tr>
        </table>
        <?php echo $this->Form->end();?>
</div>

<div id="dlg-buttons">
    <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveItem()">查询</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">取消</a>
</div>


<script type="text/javascript">

$('#dg').datagrid({
    url:'datagrid_data.json',
    url:'/admin/ga/ga_departments/json_data.json',
    fitColumns:true,
    singleSelect:true,
    rownumbers:true,
    pagination:true,
    toolbar:'#toolbar',
    pageSize:15,
    onDblClickCell:editItem,
    columns:[[
        {field:'id',title:'序号',formatter:function(value,row){return row.GaDepartment.id},width:50},
        {field:'region_id',title:'所属地区',formatter:function(value,row){return row.Region.name},width:50},
        {field:'licence',title:'经营许可证',formatter:function(value,row){return '民航通企字'+ row.Meta.licence + '号'},width:50},
        {field:'name',title:'企业名称',formatter:function(value,row){return row.GaDepartment.name},width:50},
        {field:'corporation',title:'法人代表',formatter:function(value,row){return row.Meta.corporation},width:50},
        {field:'registered_capital',title:'注册资本',formatter:function(value,row){return row.Meta.registered_capital},width:50},
        {field:'issuing_authority',title:'发证机关',formatter:function(value,row){return row.Meta.issuing_authority},width:50}
    ]]
});

var url;

function saveItem(){
    $('#fm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.success){
                $('#dlg').dialog('close');		// close the dialog
                $('#dg').datagrid('reload');	// reload the user data
            } else {
                $.messager.show({
                    title: 'Error',
                    msg: result.msg
                });
            }
        }
    });
}

function newItem(){
    url = '/admin/ga/ga_departments/add/';
    window.location = url;
}

function editItem(){
    var row = $('#dg').datagrid('getSelected');

    url = '/admin/ga/ga_departments/edit/' + row.GaDepartment.id;
    window.location = url;
}

function searchItem(){
    $('#dlg').dialog('open').dialog('setTitle','查询');
}

function search(value, name){
    $('#dg').datagrid(
        'load',
        {q:value, field:name}
    );
}


</script>

